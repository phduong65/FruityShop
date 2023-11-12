<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cart; 

class CartController extends Controller
{

    // public function cart()
    // { 
    //     $cartItems = Cart::with('product')->where('user_id', auth()->id())->get() ;
    
    //     return view('cart', ['cartItems' => $cartItems]);
    // }
    // // Hiển thị giỏ hàng
    // public function addToCart(Request $request, $productId)
    // {
    //     $product = Product::find($productId);
    
    //     if ($product) {
    //         $cartItem = Cart::updateOrCreate(
    //             [
    //                 'user_id' => auth()->id(),
    //                 'product_id' => $product->id,
    //             ],
    //             [
    //                 'product_name' => $product->name,
    //                 'product_price' => $product->price,
    //                 'product_image' => $product->image_path,
    //                 'quantity' => 1,
    //             ]
    //         );
    
    //         return response()->json(['message' => 'Product added to cart successfully', 'cartItem' => $cartItem]);
    //     } else {
    //         return response()->json(['error' => 'Product not found'], 404);
    //     }
    // }

// Hiển thị giỏ hàng
public function cart()
{
    // Lấy ID của người dùng đã đăng nhập hoặc chỉ định là null nếu chưa đăng nhập
    $userId = auth()->id() ?? 1 ;

    // Lấy thông tin giỏ hàng từ cơ sở dữ liệu
    $cartItems = $userId ? Cart::with('product')->where('user_id', $userId)->get() : [];

    return view('cart', ['cartItems' => $cartItems]);
}


public function addToCart(Request $request, $productId)
{
    // Lấy thông tin sản phẩm từ database hoặc nơi khác
    $product = Product::find($productId);

    if ($product) {
        // Lấy thông tin giỏ hàng từ session
        $cartItems = session('cart', []);

        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        $existingItem = collect($cartItems)->where('product_id', $product->id)->first();

        if ($existingItem) {
            // Nếu sản phẩm đã có trong giỏ hàng, tăng số lượng
            $existingItem['quantity']++;
        } else {
            // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới
            $cartItems[] = [
                'product_id' => $product->id,
                'product_name' => $product->name,
                'product_price' => $product->price,
                'product_image' => $product->image_path,
                'quantity' => 1,
                'user_id' => 1, // Đặt user_id là null
            ];
        }

        // Lưu thông tin giỏ hàng vào session
        session(['cart' => $cartItems]);

        return response()->json(['message' => 'Product added to cart successfully', 'cartItems' => $cartItems]);
    } else {
        return response()->json(['error' => 'Product not found'], 404);
    }
}


    // Xóa sản phẩm khỏi giỏ hàng
    // public function removeFromCart(Request $request, $productId)
    // {
    //     // Xóa sản phẩm khỏi bảng "carts" trong cơ sở dữ liệu
    //     Cart::where('user_id', auth()->id())->where('product_id', $productId)->delete();

    //     // Redirect hoặc trả về JSON response tùy thuộc vào yêu cầu của bạn
    //     return redirect()->back()->with('success', 'Product removed from cart successfully.');
    // }

    // Các phương thức khác như tính tổng giá trị đơn hàng, thanh toán, ...
    // Trong CartController.php
// // Trong CartController.php
// public function checkout()
// {
//     // Lấy thông tin giỏ hàng từ session
//     $cartItems = session('cart', []);

//     // Thực hiện thanh toán, lưu đơn hàng vào database, gửi email xác nhận, ...

//     // Xóa giỏ hàng sau khi thanh toán
//     session(['cart' => []]);

//     // Redirect hoặc trả về JSON response tùy thuộc vào yêu cầu của bạn
//     return redirect()->route('cart.index')->with('success', 'Checkout completed successfully.');
// }
// Trong CartController.php
// public function showCheckoutForm()
// {
//     // Lấy thông tin giỏ hàng từ session
//     $cartItems = session('cart', []);

//     // Gọi view để hiển thị form thanh toán
//     return view('cart.checkout', ['cartItems' => $cartItems]);
// }


}
