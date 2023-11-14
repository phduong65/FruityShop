<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    // Hiển thị giỏ hàng
    public function cart()
    {
        $userId = auth()->user()->id ?? 1; // Nếu bạn đang sử dụng xác thực người dùng
        $cartItems = Cart::where('user_id', $userId)->get();
        return view('cart', ['cartItems' => $cartItems]);
    }

    // Thêm sản phẩm vào giỏ hàng
    public function addToCart(Request $request)
    {
        $product = Product::find($request->input('id'));
        if ($product) {
            // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
            $existingItem = Cart::where('user_id', auth()->user()->id ?? 1)
                ->where('product_id', $product->id)
                ->first();

            if ($existingItem) {
                // Nếu sản phẩm đã tồn tại, tăng quantity lên
                $existingItem->quantity++;
                $existingItem->save();
            } else {
                // Nếu sản phẩm chưa tồn tại, tạo mới một bản ghi trong CSDL
                Cart::create([
                    'user_id' => auth()->user()->id ?? 1,
                    'product_id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'image' => $product->photo,
                    'quantity' => 1,
                ]);
            }
            return redirect()->route('cart');
        }
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function removeFromCart(Request $request, $productId)
    {
        // Tìm và xóa bản ghi trong CSDL dựa trên product_id và user_id
        $user_id = auth()->user()->id ?? 1; // Nếu bạn đang sử dụng xác thực người dùng
        Cart::where('user_id', $user_id)->where('product_id', $productId)->delete();
        $cartItems = Cart::where('user_id', $user_id)->get();
        return redirect()->route('home',['cart',$cartItems]);
    }

}
