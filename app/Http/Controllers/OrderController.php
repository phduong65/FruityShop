<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
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
        $total =0 ;
        foreach ($cartItems as $item) {
            $total += $item->price;
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
        if (auth()->check()) {
            $orders->id_user= Auth::user()->id;
            $orders->name_user = $request->input('name');
            $orders->email_user = $request->input('email');
            $orders->phone_user = $request->input('phone');
            $orders->address_user = $request->input('address');
            $orders->total_price = 0;
            $orders->status = "Dang xu ly";
            $orders->note_user = $request->input('note');
            $orders->save();
            return redirect('success')->with('orders', $orders);
        }
        else {
            return redirect()->route('login');
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
}
