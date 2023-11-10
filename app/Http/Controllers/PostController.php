<?php

namespace App\Http\Controllers;

use App\Models\CategoryPost;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::paginate(4);
        return view("manager.posts.index", compact("post"));
    }
    /**
     * Lấy tất cả bài viết đã được công bố
     */
    public function getallpublishpost(Request $request)
    {
        // Lấy bài nổi bật đầu tiên
        $postoutstandone = Post::where('post_status', 'publish')
            ->where('post_outstand', 'open')
            ->firstOrFail();
        // Lấy tất cả post đã công bố và nổi bật
        $postoutstand = Post::where('post_status', 'publish')
            ->where('post_outstand', 'open')
            ->skip(1) // Bỏ qua 1 bài viết đầu tiên
            ->take(3) // Lấy 3 bài viết
            ->get();
        // Lấy tất cả category
        $categories = CategoryPost::all();
        // Lấy 6 bài viết mới nhất
        $postnew = Post::where('post_status', 'publish')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
        // Lấy tất cả post đã công bố và phân trang
        $postpaginate = Post::where('post_status', 'publish')->paginate(6);
        // Lấy danh sách các sản phẩm đã xem gần đây từ session
        $recentlyViewed = session('viewedProducts', []);
        if (!empty($recentlyViewed)) {
            $recentlyViewedPosts = Post::whereIn('id', $recentlyViewed)
                ->orderByRaw("FIELD(id, " . implode(',', $recentlyViewed) . ") DESC")
                ->get();
        } else {
            $recentlyViewedPosts = collect(); // Không có sản phẩm nào
        }

        return view('post.index', compact('postoutstandone', 'postoutstand', 'categories', 'postnew', 'postpaginate', 'recentlyViewedPosts'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = CategoryPost::all();
        return view("manager.posts.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif',
            'post_status' => 'required',
        ]);
        // Upload hình lớn vào thư mục post
        $filePhotoPost = $request->file('photo');
        $fileNamePost = $filePhotoPost->getClientOriginalName();
        $filePhotoPost->move('uploads/post', $fileNamePost);
        // 
        $post = new Post($request->all());
        $post->title = $request->input('title');
        $post->content = htmlentities($request->input('content'), ENT_QUOTES, 'UTF-8');
        $post->photo = $fileNamePost;
        $post->save();
        $post->categories_post()->attach($request->input('categories'));
        return redirect('/posts')->with('success', 'Add new post');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // lấy post chi tiết
        $post = Post::find($id);
        //  lượt xem
        if ($post) {
            $post->view += 1;
            $post->save();
        }
        // lấy allpost đã công bố chung category vs post chi tiết
        $relatedPosts = Post::whereHas('categories_post', function ($query) use ($post) {
            $query->whereIn('category_posts.id', $post->categories_post->pluck('id'));
        })
            // loại trừ post hiện tại
            ->where('id', '!=', $post->id)
            ->where('post_status', 'publish')
            ->take(5)
            ->get();
        // Lấy 6 bài viết mới nhất
        $postnew = Post::where('post_status', 'publish')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
        // Lấy 6 bài viết có lượt xem nhiều nhất
        $mostViewedPosts = Post::orderBy('view', 'desc')->take(6)->get();
        // Lấy danh sách các bài viết đã xem từ session hoặc khởi tạo nếu chưa tồn tại
        $productId = $id;
        $viewedProducts = session('viewedProducts', []);
        // Kiểm tra xem sản phẩm này đã được xem chưa
        if (!in_array($productId, $viewedProducts)) {
            // Nếu chưa xem, thêm ID sản phẩm vào danh sách
            $viewedProducts[] = $productId;
            // Giới hạn số lượng sản phẩm trong danh sách (ví dụ: 5 sản phẩm)
            if (count($viewedProducts) > 5) {
                array_shift($viewedProducts);
            }
            // Lưu danh sách vào session
            session(['viewedProducts' => $viewedProducts]);
        }

        return view('post.show', compact('post', 'relatedPosts', 'postnew', 'mostViewedPosts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $post = Post::find($id);
        $categories = CategoryPost::all();
        return view('manager.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);
        // dd($arr);
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif',
            'post_status' => 'required',
        ]);
        $post->title = $request->input('title');
        $post->content = htmlentities($request->input('content'), ENT_QUOTES, 'UTF-8');
        $post->post_status = $request->input('post_status');
        $post->post_outstand = $request->has('post_outstand') ? 'open' : 'close';
        $post->comment_status = $request->has('comment_status') ? 'open' : 'close';

        if ($request->hasFile('photo')) {
            // Xóa hình cũ nếu tồn tại
            if (file_exists(public_path('uploads/post/' . $post->photo)) && !is_dir(public_path('uploads/post/' . $post->photo))) {
                unlink(public_path('uploads/post/' . $post->photo));
            }
            // Upload hình mới và cập nhật tên hình
            $filePhotoPost = $request->file('photo');
            $fileNamePost = $filePhotoPost->getClientOriginalName();
            $filePhotoPost->move('uploads/post', $fileNamePost);
            $post->photo = $fileNamePost;
        }
        $post->save();
        $post->categories_post()->sync($request->input('categories'));
        return redirect('/posts')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $photoPath = public_path('uploads/post/' . $post->photo);
        if (file_exists($photoPath)) {
            unlink($photoPath); // Xóa hình lớn
        }
        $post->categories_post()->detach();
        $post->delete();
        return redirect('/posts');
    }
}
