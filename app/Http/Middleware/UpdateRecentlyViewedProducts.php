<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class UpdateRecentlyViewedProducts
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $productId = $request->route('product'); // Điều này giả sử route có tham số {product}
        $lastTwoDigits = substr($productId, -2);
        if ($lastTwoDigits) {
            $recentlyViewedProducts = Session::get('recently_viewed_products', []);
            array_unshift($recentlyViewedProducts, $lastTwoDigits);
            $recentlyViewedProducts = array_slice(array_unique($recentlyViewedProducts), 0, 5);
            Session::put('recently_viewed_products', $recentlyViewedProducts);
        }

        return $next($request);
    }
}
