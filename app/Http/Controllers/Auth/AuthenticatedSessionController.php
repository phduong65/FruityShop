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
use Illuminate\Support\Facades\Log;
use App\Models\UserProfile;





class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }
    // ...

    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleProviderCallback(Request $request)
{
        $user = Socialite::driver('google')->user();

    $existingUser = User::where('email', $user->getEmail())->first();

    if ($existingUser) {
        // Nếu người dùng đã tồn tại, đăng nhập người dùng
        Auth::login($existingUser);

        // Chuyển hướng người dùng đến trang chủ
        return redirect('/');
    } else {
        // Tạo người dùng mới
        $newUser = User::create([
            'name' => $user->name,
            'email' => $user->email,
            'email_verified_at' => null,
            'password' => bcrypt('1234567890Aa@'),
        ]);
        $userProfile = UserProfile::create([
            'user_id' => $newUser->id,
            'name' => $user->name,
            'avatar' => null,
            'cover' => null,
            'address' => null,
            'birth' => null,
            'phone' => null,
            'introduce' => null,
        ]);
        
        // Đăng nhập người dùng mới
        auth()->login($newUser);

        // Chuyển hướng người dùng đến trang chủ
        return redirect()->intended(RouteServiceProvider::HOME);
    }
}

    

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        
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
