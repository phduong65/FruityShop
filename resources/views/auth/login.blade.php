<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="text-login">
        <a href="/">{{ __('Trang Chủ') }}</a>
        <H1>{{ __('ĐĂNG NHẬP') }}</H1>
        <p>{{ __('Vui lòng đăng nhập hệ thống') }}</p>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger" >
                {{ session('error') }}
            </div>
        @endif
    </div>

    <form method="POST" action="{{ route('login') }}" class="login-form">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <br>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-3">
            <x-input-label for="password" :value="__('Mật khẩu')" />
            <br>
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class=" mb-3 btn-forgot">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Quên mật khẩu ?') }}
                </a>
            @endif
        </div>
        <div class="mb-3 btn-login"><x-primary-button class="mb-3" style="text-align: center;">
                {{ __('ĐĂNG NHẬP') }}
            </x-primary-button>
        </div>
        <div class="mb-3 btn-logins"><x-primary-button class="mb-3" style="text-align: center;">
                <x-primary-button class=" btn-google">
                    <a href="{{ url('/auth/google') }}" class="btn btn-gg">
                        <i class="icon-gg fa-brands fa-google-plus-g"></i>{{ __('Đăng nhập bằng Google') }}
                    </a>
                </x-primary-button>
                <x-primary-button class=" btn-facebook">
                    <a href="{{ url('/auth/facebook') }}" class="btn btn-fb">
                        <i class="icon-fb fa-brands fa-facebook-f"></i>{{ __(' Đăng nhập bằng Facebook') }}
                    </a>
                </x-primary-button>
            </x-primary-button>
        </div>
        <div class="mb-3 title-login">
            <p>{{ __('Bạn chưa có tài khoản?') }}<a href="{{ route('register') }}"> {{ __('Đăng ký') }}</a></p>
        </div>
        <!-- Remember Me -->
        <div class="mb-3 btn-remember">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Ghi nhớ đăng nhập') }}</span>
            </label>
        </div>
    </form>
</x-guest-layout>
