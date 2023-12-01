<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckManagerRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Kiểm tra xem người dùng đã đăng nhập và có quyền quản lý không
        if (Auth::check() && Auth::user()->role === 'manager') {
            return $next($request);
        }

        // Nếu không có quyền, chuyển hướng hoặc xử lý theo ý muốn của bạn
        return redirect('404')->with('error', 'Bạn không có quyền truy cập trang quản lý.');
    }
}
