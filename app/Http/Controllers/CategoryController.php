<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $data = Category::all();

        return view('manager.category_product.index', compact('data'));
    }

    public function create(Request $request)
    {
       $request->validate([
        'category'=>'required',
       ]);
        // Kiểm tra xem danh mục có tồn tại trong cơ sở dữ liệu không
        $existingCategory = Category::where('name', $request->category)->first();

        if ($existingCategory) {
            // Nếu danh mục đã tồn tại, hiển thị thông báo lỗi hoặc thực hiện xử lý tùy ý
            return redirect()->back()->with('error', 'Danh mục đã tồn tại.');
        }
        $data = new Category;

        $data->name = $request->category;

        $data->save();
        return redirect()->back()->with('message', 'Thêm thành công');
    }

    public function delete($id)
    {
        $data = Category::find($id);

        $data->delete();
        return redirect()->back()->with('message', 'Xóa thành công');
    }
    // public function show($id)
    // {
    //     $data = Category::find($id);

    //     return view('manager.index', compact('data'));
    // }
    public function update(Request $request, $id)
    {

        $existingCategory = Category::where('name', $request->name)->first();

        if ($existingCategory) {
            // Nếu danh mục đã tồn tại, hiển thị thông báo lỗi hoặc thực hiện xử lý tùy ý
            return redirect()->back()->with('error', 'Danh mục đã tồn tại.');
        }
        $cate = new Category($request->all());
        $cate = Category::find($id);
        $cate->name = $request->input('name');
        $cate->save();
        return redirect()->back()->with('message', 'Sửa thành công');
    }
}
