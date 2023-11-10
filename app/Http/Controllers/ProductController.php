<?php

namespace App\Http\Controllers;

use App\Models\Product;
// use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index')->with('products',$products);
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
    // Format VNĐ
    public static function asVND($value) {
        return number_format($value, 0, ".") ."₫";;
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
