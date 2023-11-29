<?php

namespace App\Http\Controllers;

use App\Models\CommentProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            'user_id' => 'required',
            'product_id' => 'required',
            'content' => 'required',
        ]);
        $comments = new CommentProduct($request->all());
        $comments->content = $request->input('content');
        $comments->save();
        $product = Product::find($request->input('product_id'));
        $product->comment_count += 1;
        $product->save();
        $encryptionone = '493275427158023849218444922492048902';
        $encryptiontwo = '94721074921748127486217101204231940921034921849280';
        $urlDetail = $encryptionone . $encryptiontwo . $request->input('product_id');
        return redirect()->route('products.show', $urlDetail);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $comments = $product->comments();
        return view('product.show', compact('comments'));
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
