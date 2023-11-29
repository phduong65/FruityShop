<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $voucher = Voucher::all();
        return view('manager.voucher.index')->with('vouchers',$voucher);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('manager.voucher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $voucher = new Voucher();
        $voucher->code = $request->input('code');
        $voucher->discount_percentage = (int) $request->input('discount_percentage');
        $voucher->is_active	 = $request->input('is_active');
        $voucher->expires_at = $request->input('expires_at');
        $voucher->usage_limit = (int)$request->input('usage_limit');
        $voucher->min_order_value = (int)$request->input('min_order_value');
        $voucher->quantity = (int)$request->input('quantity'); 
        $voucher->save();
        return redirect('/vouchers');
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
        $voucher = Voucher::where('id',$id)->first();
        if ($voucher) {
            $voucher->delete();
            return redirect('vouchers')->with('success', 'Đơn hàng đã được xóa thành công.');
        }
        return redirect('vouchers')->with('erorr', 'Đơn hàng đã được không xóa thành công.');
    }
}
