<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{



    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $products = Product::orderBy('created_at', 'desc')->paginate(8);
        if ($request->ajax()) {
            $view = view('data', compact('products'))->render();
            return response()->json(['html' => $view]);
        }
        return view('allproduct', compact('products'));

        
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
    }

    public function sort(Request $request, $order) {
        if ($order === 'asc') {
            $products = Product::orderBy('price', 'asc')->paginate(8);
            if($request->ajax()){
                $view = view('data',compact('products'))->render();
                return response()->json(['html' => $view]);
            }
            return view('allproduct', compact('products'));
        }
        else if ($order === 'desc') {
            $products = Product::orderBy('price', 'desc')->paginate(8);
            if($request->ajax()){
                $view = view('data',compact('products'))->render();
                return response()->json(['html' => $view]);
            }     
            return view('allproduct', compact('products'));
            
        }
        else
        {
            return;
        }
        
    }
    // public function getSort(Request $request)
    // {
    //     $sortBy = $request->input('sort_by');

    //     if ($sortBy === 'old') {
    //         $extras = Product::orderBy('price', 'asc')->get();
    //     } else if ($sortBy === 'new') {
    //         $extras = Product::orderBy('price', 'desc')->get();
    //     } else {
    //         $extras = Product::all();
    //     }
    //     return response()->json(['products' => $extras]);
    // }

}
