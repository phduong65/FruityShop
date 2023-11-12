<x-guest-layout>
    <div class="text-register">
        <a href="/">{{ __('Trang Chủ') }}</a>
        <H1>{{ __('ĐĂNG KÝ') }}</H1>
        <p>{{ __('Tham gia cùng chúng tôi') }}</p>
    </div>
    <form method="POST" action="{{ route('register') }}" class="register-form">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Tên')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <!-- Email Address -->
        <div class="text-prof" style="display: flex">
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="mt-4 text-phone">
                <x-input-label for="phone" :value="__('Số điện thoại')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="phone" name="phone" :value="old('phone')"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>
        </div>
        <div class="mt-4">
            <x-input-label for="address" :value="__('Địa chỉ')" />

            <x-text-input id="address" class="block mt-1 w-full" type="address" name="address" required
                autocomplete="new-address" />

            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mật khẩu')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Xác nhận mật khẩu')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <form method="POST" action="{{ route('verification.link.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Send Mail') }}
                </x-primary-button>
            </div>
        </form>
        <p>{{ __('Bạn đã có tài khoản?') }}<a href="{{ route('login') }}">
                {{ __('Đăng nhập') }}</a></p>
        </div>
    </form>
</x-guest-layout>
