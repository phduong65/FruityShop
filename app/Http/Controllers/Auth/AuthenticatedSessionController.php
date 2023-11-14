<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Session; // Thêm dòng này
use Illuminate\Support\Facades\Redirect;




class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        $authUser = User::where('email', $user->getEmail())->first();

        if ($authUser) {
            // Đăng nhập người dùng
            auth()->login($authUser);

            // Chuyển hướng người dùng đến trang chủ
            return redirect('/');
        } else {
            // Tạo người dùng mới
            $user = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => '',
            ]);

            // Đăng nhập người dùng mới
            auth()->login($user);

            // Chuyển hướng người dùng đến trang chủ
            return redirect('/');
        }
    }
    

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        // $user = Auth::user();

        // // Kiểm tra xác minh email chỉ khi người dùng đăng nhập lần đầu
        // if ($user && $user->email_verified_at === null) {
        //     Auth::guard('web')->logout();
        //     $request->session()->invalidate();
        //     $request->session()->regenerateToken();
    
        //     return redirect('/login')->with('error', 'Vui lòng xác minh địa chỉ email trước khi đăng nhập.');
        // }
        
        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    
}
