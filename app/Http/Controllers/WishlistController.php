<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        return view('profile.wishlist',['wishlists' => $wishlist]);
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
        $wishlist = Wishlist::find($id);
        $wishlist->delete();
        return response()->json();
    }
    public function toggle($product_id)
    {
        if (Auth::check()) {
            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $product_id)->exists()) {
                return redirect()->back()->with('error', 'Đã tồn tại trong danh sách !');
            } else {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $product_id,
                ]);
                return redirect()->back()->with('success', 'Added to Wishlist Successfully !');
            }
        } else {
            return redirect()->back()->with('error', 'Vui lòng đăng nhập !');
        }
    }
}
