<?php

namespace App\Http\Controllers;

use App\Models\CategoryPost;
use Illuminate\Http\Request;

class CategoryPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categryPost = CategoryPost::all();
        return view('manager.category_post.index', compact('categryPost'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);
        // Kiểm tra xem danh mục có tồn tại trong cơ sở dữ liệu không
        $existingCategory = CategoryPost::where('name', $request->name)->first();

        if ($existingCategory) {
            // Nếu danh mục đã tồn tại, hiển thị thông báo lỗi hoặc thực hiện xử lý tùy ý
            return redirect()->back()->with('error', 'Danh mục đã tồn tại.');
        }
        $categryPost = new CategoryPost();

        $categryPost->name = $request->name;

        $categryPost->save();
        return redirect()->back()->with('message', 'Thêm thành công');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function deletePost($id)
    {
        $categoryPost = CategoryPost::find($id);

        $categoryPost->delete();
        return redirect()->back()->with('message', 'Xóa thành công');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
           ]);

        $existingCategory = CategoryPost::where('name', $request->name)->first();

        if ($existingCategory) {
            // Nếu danh mục đã tồn tại, hiển thị thông báo lỗi hoặc thực hiện xử lý tùy ý
            return redirect()->back()->with('error', 'Danh mục đã tồn tại.');
        }
        $categoryPost = new CategoryPost($request->all());
        $categoryPost = CategoryPost::find($id);
        $categoryPost->name = $request->input('name');
        $categoryPost->save();
        return redirect()->back()->with('message', 'Sửa thành công');
    }
}
