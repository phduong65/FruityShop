<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Post;
// use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\CommentProduct;
use App\Models\Order;
use App\Models\Product;
use App\Models\Setting;
use App\Models\User;
use App\Models\ViewedProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{



    /**
     * Display a listing of the resource.
     */
    public function geAllProduct()
    {
        $products = Product::all();
        return view('products.index')->with('products', $products);
    }
    public function getProductHome()
    {
        $setting = Setting::find(1);
        $all_post = Post::orderBy('created_at', 'desc')->take(4)->get();
        $products_sell = Product::where('discount', '>', 0)
            ->where('status', '=', 'publish')
            ->take(8) // Replace 10 with the desired limit
            ->get();
        return view('products.index')->with('products', $products_sell)
            ->with('allPost', $all_post)->with('setting',$setting);
    }
    public function getNewProducts(Request $request)
    {
        $query = Product::query();

        $condition = $request->input('condition');
        if (!is_null($condition)) {
            switch ($condition) {
                case 'latest':
                    $query->latest('created_at')->take(8);
                    break;
                case 'price_high':
                    $query->orderBy('price', 'asc')->take(8);
                    break;
                case 'price_low':
                    $query->orderBy('price', 'desc')->take(8);
                    break;
            }
        }
        $products_fill = $query->get();
        foreach ($products_fill as $item) {
            $item->fm_price = number_format($item->price, 0, '', ',') . '₫';
            if ($item->discount > 0) {
                $item->dis_price = $item->price - ($item->price * ($item->discount / 100));
                $item->dis_price = number_format($item->dis_price, 0, '', ',') . '₫';
            } else {
                $item->dis_price = '';
            }
        }
        return response()->json(['products_fill' => $products_fill]);
    }
    public function index(Request $request)
    {
        $search = $request->input('name');
        if ($search) {
            $products = Product::where('name', 'like', '%' . $search . '%')->paginate(5);
            $products->appends(['name' => $search]);
        } else {
            $products = Product::paginate(5);
        }
        return view('manager.products.index', compact('products'));
    }
    /**
     * Lấy tất cả sản phẩm đã được công bố
     */
    public function getallpublish()
    {
        $products = Product::where('status', 'publish')->get();
        return view('', compact('products'));
    }
    
    /**
     * Lấy tất cả sản phẩm nổi bật
     */
    public function getallfeatured()
    {
        $products = Product::where('status', 'publish')->where('outstand', 'open')->get();
        return view('', compact('products'));
    }

    public function managerproduct()
    {
        $sl_product = 0;
        $sl_user = 0;
        $sl_donhang = 0;
        $sl_tintuc = 0;
        $sl_product = Product::count();
        $sl_user = User::count();
        $sl_donhang = Order::count();
        $sl_tintuc = Post::count();
        return view('manager.doashboard', compact('sl_product','sl_user','sl_donhang','sl_tintuc'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('manager.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nameproduct' => 'required',
            'description' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'quantity' => 'required',
            'status' => 'required',
            'photobig' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
            'photomini.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
        ]);

        // Upload hình lớn vào thư mục photobig
        $filephotoBig = $request->file('photobig');
        $fileNamePTB = $filephotoBig->getClientOriginalName();
        $filephotoBig->move('uploads/photobig', $fileNamePTB);

        // Upload hình nhỏ vào thư mục photomini
        $filephotoMini = $request->file('photomini');
        $fileNamesPTMM = [];
        foreach ($filephotoMini as $file) {
            $fileNamePTMM = $file->getClientOriginalName();
            $file->move('uploads/photomini', $fileNamePTMM);
            $fileNamesPTMM[] = $fileNamePTMM;
        }

        $product = new Product($request->all());
        $product->name = $request->input('nameproduct');
        $product->description = htmlentities($request->input('description'), ENT_QUOTES, 'UTF-8');
        $product->price = (int) $request->input('price');
        $product->discount = (int) $request->input('discount');
        $product->quantity = (int) $request->input('quantity');
        $product->photo = $fileNamePTB;
        $product->thumnail = json_encode($fileNamesPTMM); // Lưu danh sách hình nhỏ dưới dạng JSON
        $product->save();
        $product->categories()->attach($request->input('categories'));
        return redirect('/products')->with('success', 'Add new product');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        // giải mã hoá id product trên url
        $urlDetail = $id;
        $strBefore = '493275427158023849218444922492048902';
        $strAfter = '94721074921748127486217101204231940921034921849280';
        $urlDetail = str_replace($strBefore, '', $urlDetail);
        $urlDetail = str_replace($strAfter, '', $urlDetail);
        $productId = (int)$urlDetail;
        // lấy sản phẩm chi tiết
        $product = Product::find($productId);
        if (Auth::check()) {
            // Kiểm tra xem ID đã tồn tại trong cơ sở dữ liệu hay chưa
            $existingViewedProduct = ViewedProduct::where('user_id', auth()->id())
                ->where('product_id', $product->id)
                ->first();

            if ($existingViewedProduct) {
                // Nếu đã tồn tại, xóa cái cũ
                $existingViewedProduct->delete();
            }
            ViewedProduct::create([
                'user_id' => auth()->id(),
                'product_id' => $product->id,
            ]);
            $product->increment('view');
        } else {
            return redirect('login');
        }
        if (!$product) {
            return abort(404);
        }

        // lấy sản phẩm tương tự
        $relatedPosts = Product::whereHas('categories', function ($query) use ($product) {
            $query->whereIn('categories.id', $product->categories->pluck('id'));
        })
            // loại trừ post hiện tại
            ->where('id', '!=', $product->id)
            ->where('status', 'publish')
            // ->take(4)
            ->get();
        //  lấy id user
        $infor = null;
        if (Auth::user()) {
            $id_user = Auth::user()->id;
            $infor = User::find($id_user);
        }
        // lấy comment theo product
        $prd = new Product();
        $comments = $prd->comments();

        return view('product.show', compact('product', 'relatedPosts', 'infor', 'comments'));
    }
    public function viewedProducts()
    {
        // Lấy lịch sử xem của người dùng hiện tại
        $viewedProducts = ViewedProduct::where('user_id', auth()->id())
            ->with('product')
            ->latest()
            ->take(8)
            ->get();
        return view('products.recently', ['viewedProducts' => $viewedProducts]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $product = Product::find($id);
        if (!$product) {
            return abort(404);
        }
        $categories = Category::all();
        return view('manager.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $product = Product::findOrFail($id);
        if (!$product) {
            return abort(404);
        }
        $request->validate([
            'nameproduct' => 'required',
            'description' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'quantity' => 'required',
            'status' => 'required',
            'photobig' => 'image|mimes:jpeg,png,jpg,gif,webp',
            'photomini.*' => 'image|mimes:jpeg,png,jpg,gif,webp',
        ]);

        // Update các thuộc tính của sản phẩm
        $product->name = $request->input('nameproduct');
        $product->description = htmlentities($request->input('description'), ENT_QUOTES, 'UTF-8');
        $product->price = (int) $request->input('price');
        $product->discount = (int) $request->input('discount');
        $product->quantity = (int) $request->input('quantity');
        $product->status =  $request->input('status');
        $product->outstand =  $request->input('outstand');
        ($request->has('outstand')) ? $product->outstand = "open" : $product->outstand = "close";
        if ($request->hasFile('photobig')) {
            // Xóa hình lớn cũ nếu tồn tại
            if (file_exists(public_path('uploads/photobig/' . $product->photo)) && !is_dir(public_path('uploads/photobig/' . $product->photo))) {
                unlink(public_path('uploads/photobig/' . $product->photo));
            }

            // Upload hình lớn mới và cập nhật tên hình
            $filephotoBig = $request->file('photobig');
            $fileNamePTB = $filephotoBig->getClientOriginalName();
            $filephotoBig->move('uploads/photobig', $fileNamePTB);
            $product->photo = $fileNamePTB;
        }

        if ($request->hasFile('photomini')) {
            // Xóa các hình nhỏ cũ nếu tồn tại
            $oldThumbnails = json_decode($product->thumnail);
            foreach ($oldThumbnails as $oldThumbnail) {
                if (file_exists(public_path('uploads/photomini/' . $oldThumbnail)) && !is_dir(public_path('uploads/photomini/' . $oldThumbnail))) {
                    unlink(public_path('uploads/photomini/' . $oldThumbnail));
                }
            }

            // Upload các hình nhỏ mới và cập nhật danh sách hình
            $filephotoMini = $request->file('photomini');
            $fileNamesPTMM = [];
            foreach ($filephotoMini as $file) {
                $fileNamePTMM = $file->getClientOriginalName();
                $file->move('uploads/photomini', $fileNamePTMM);
                $fileNamesPTMM[] = $fileNamePTMM;
            }
            $product->thumnail = json_encode($fileNamesPTMM);
        }

        $product->save();
        $product->categories()->sync($request->input('categories'));

        return redirect('/products')->with('success', 'Update product successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product = Product::find($id);
        if (!$product) {
            return abort(404);
        }
        // Lấy đường dẫn của hình lớn
        $photoPath = public_path('uploads/photobig/' . $product->photo);
        if (file_exists($photoPath)) {
            unlink($photoPath); // Xóa hình lớn
        }
        // Lấy danh sách các hình nhỏ từ trường 'thumnail' của sản phẩm (chuyển đổi từ JSON)
        $thumbnails = json_decode($product->thumnail);

        // Xóa các tệp hình nhỏ
        foreach ($thumbnails as $thumbnail) {
            $thumbnailPath = public_path('uploads/photomini/' . $thumbnail);

            if (file_exists($thumbnailPath)) {
                unlink($thumbnailPath);
            }
        }
        $product->categories()->detach();
        $product->delete();
        return redirect('/products');
    }

    public function sort(Request $request, $order)
    {
        $categoriesWithProducts = Category::with('products')->get();
        if ($order === 'asc') {
            $products = Product::where('status', 'publish')->orderBy('price', 'asc')->paginate(8);
            if ($request->ajax()) {
                $view = view('data', compact('products'))->render();
                return response()->json(['html' => $view]);
            }
            return view('allproduct', compact('products','categoriesWithProducts'));
        } else if ($order === 'desc') {
            $products = Product::where('status', 'publish')->orderBy('price', 'desc')->paginate(8);
            if ($request->ajax()) {
                $view = view('data', compact('products','categoriesWithProducts'))->render();
                return response()->json(['html' => $view]);
            }
            return view('allproduct', compact('products','categoriesWithProducts'));
        } else if ($order === 'outsand') {
            $products = Product::where('outstand', 'open')->where('status', 'publish')->paginate(8);
            if ($request->ajax()) {
                $view = view('data', compact('products'))->render();
                return response()->json(['html' => $view]);
            }
            return view('allproduct', compact('products','categoriesWithProducts'));
        } else {
            return;
        }
    }
    public function getAllProduct(Request $request, Category $category)
    {
        $products = Product::where('status', 'publish')->orderBy('created_at', 'desc')->paginate(8);
        if ($request->ajax()) {
            $view = view('data', compact('products'))->render();
            return response()->json(['html' => $view]);
        }
        $categoriesWithProducts = Category::with('products')->get();
        return view('allproduct', compact('products','categoriesWithProducts'));
    }
    public static function asVND($value)
    {
        return number_format($value, 0, ".") . "₫";;
    }
    public function search(Request $request)
    {
        $query = Product::query();
        if ($request->ajax()) {
            $extras = $query
                ->where('name', 'like', '%' . $request->keyword . '%')
                ->get();
            // var_dump($extras);
            return response()->json(['list_search' => $extras]);
        } else {
            $extras = $query->get();
            return view('home', ['list_search' => $extras]);
        }
    }

   
}
