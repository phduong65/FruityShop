<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->user()->id ?? 1; // Nếu bạn đang sử dụng xác thực người dùng
        $cartItems = Cart::where('user_id', $userId)->get();
        $total = 0 ;
        foreach ($cartItems as $item) {
            $total += $item['product_price']*$item['quantity'];
        }
        return view('orders.index')->with('cartItems',$cartItems)
                                ->with('total',$total);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $prefix = '#';
        $orders = new Order();
        $orders->id_orders = $prefix . Str::random(6);
        // Lấy dữ liệu từ request
        $city = $request->input('inputCountry');
        $district = $request->input('inputQuan');
        $ward = $request->input('inputHuyen');
        // Kết hợp các giá trị thành một chuỗi
        $fullAddress = "{$ward}, {$district}, {$city}";
        $userId = auth()->user()->id ?? 1; // Nếu bạn đang sử dụng xác thực người dùng
        $cartItems = Cart::where('user_id', $userId)->get();
        $total = 0 ;
        $allID_product =[];
        foreach ($cartItems as $item) {
            $total += $item['product_price']*$item['quantity'];
            $allID_product += $item['product_id'];
        }

        if (auth()->check()) {
            $orders->id_user= Auth::user()->id;
            $orders->name_user = $request->input('name');
            $orders->email_user = $request->input('email');
            $orders->phone_user = $request->input('phone');
            $orders->address_user = $fullAddress;
            $orders->total_price = $total;
            $orders->status = "Dang xu ly";
            $orders->note_user = $request->input('note');
            $orders->save();
            Cart::where('user_id', auth()->user()->id)->delete();
            return redirect('/')->with('orders', $orders)->
                                with('success','Đặt hàng thành công');
        }
        else {
            return redirect('login');
        }
        
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
    public function deleteOrder($orderCode){
        $order = Order::where('id',$orderCode)->first();
        if ($order) {
            $order->delete();
            return redirect('/manager_orders')->with('success', 'Đơn hàng đã được xóa thành công.');
        }
        return redirect('/manager_orders')->with('erorr', 'Đơn hàng đã được không xóa thành công.');
    }
    // Manager ORDER
    public function managerOrders(){
        $your_orders = Order::orderBy('created_at', 'desc')
        ->get();
        return view('manager.orders.index')->with('orders',$your_orders);
    }
    public function changeStatus(Request $request){
        $id = $request -> input('id');
        $status_changed = $request->input('selected-status');
        var_dump($status_changed);
        $order = Order::findOrFail($id);
        $order->status = $status_changed;
        $order->save();
        return redirect('/manager_orders');
        
    }
}
