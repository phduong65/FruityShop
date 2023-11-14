<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
    public function getProductHome(){
        $all_post = Post::orderBy('created_at', 'desc')->take(4)->get();
        $products_sell = Product::where('discount', '>', 0)
                                ->where('status','=','publish')
                  ->take(8) // Replace 10 with the desired limit
                  ->get();
        return view('products.index')->with('products',$products_sell)
                                        ->with('allPost',$all_post);
    }
    public function getNewProducts(Request $request){
        $query = Product::query();

        $condition = $request->input('condition');
        if (!is_null($condition)) {
            switch ($condition) {
                case 'latest':
                    $query->latest('created_at')->take(8);
                    break;
                case 'price_high':
                    $query->orderBy('price', 'asc')->take(8);
                    break;
                case 'price_low':
                    $query->orderBy('price', 'desc')->take(8);
                    break;
            }
        }
        $products_fill = $query->get();
        foreach ($products_fill as $item) {
            $item->fm_price = number_format($item->price,0,'',',').'₫';
            if ($item->discount>0) {
                $item->dis_price = $item->price-($item->price*($item->discount/100));
                $item->dis_price = number_format($item->dis_price,0,'',',').'₫';
            }
            else{
                $item->dis_price = '';
            }
        }
        return response()->json(['products_fill' => $products_fill]);
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
