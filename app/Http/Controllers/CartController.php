<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Hiển thị giỏ hàng
    public function cart()
    {
        if (Auth::check()) {
            $userId = auth()->user()->id; // Nếu bạn đang sử dụng xác thực người dùng
            $cartItems = Cart::where('user_id', $userId)->get();
            return view('cart', ['cartItems' => $cartItems]);
        }
        else
        return redirect('login');
    }

    // Thêm sản phẩm vào giỏ hàng
    public function addToCart(Request $request)
    {
        $product = Product::find($request->input('id'));
        var_dump($product->name);
        if ($product) {
            // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
            if (Auth::check()) {
                # code...
                $existingItem = Cart::where('user_id', Auth::id() )
                    ->where('product_id', $product->id)
                    ->first();
            }
            else {
                return redirect('login');
            }

            if ($existingItem) {
                // Nếu sản phẩm đã tồn tại, tăng quantity lên
                $existingItem->quantity++;
                $existingItem->save();
            } else {
                // Nếu sản phẩm chưa tồn tại, tạo mới một bản ghi trong CSDL
                Cart::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'product_price' => $product->price - $product->price*($product->discount /100),
                    'product_image' => $product->photo,
                    'quantity' => 1,
                ]);
            }
            return redirect()->route('cart');
        }
        else {
            return redirect()->route('home');
        }
        
    }
    public function addToCartDetail(Request $request)
    {
        $product = Product::find($request->input('id'));
        var_dump($product->name);
        if ($product) {
            // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
            if (Auth::check()) {
                # code...
                $existingItem = Cart::where('user_id', Auth::id() )
                    ->where('product_id', $product->id)
                    ->first();
            }
            else {
                return redirect('login');
            }

            if ($existingItem) {
                // Nếu sản phẩm đã tồn tại, tăng quantity lên
                $existingItem->quantity=$existingItem->quantity+$request->input('quality');
            } else {
                // Nếu sản phẩm chưa tồn tại, tạo mới một bản ghi trong CSDL
                var_dump($product->price - $product->price*($product->discount /100));
                Cart::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'product_price' =>  $product->price - $product->price*($product->discount /100),
                    'product_image' => $product->photo,
                    'quantity' => $request->input('quality'),
                ]);
            }
            return redirect()->route('cart');
        }
        else {
            return redirect()->route('home');
        }
        
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function removeFromCart(Request $request, $productId)
    {
        // Tìm và xóa bản ghi trong CSDL dựa trên product_id và user_id
        $user_id = auth()->user()->id; // Nếu bạn đang sử dụng xác thực người dùng
        Cart::where('user_id', $user_id)->where('product_id', $productId)->delete();
        $cartItems = Cart::where('user_id', $user_id)->get();
        return redirect()->route('home',['cart',$cartItems]);
    }

}
