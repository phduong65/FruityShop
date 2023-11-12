<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 text-register">
        <p>{{ __('
        Quên mật khẩu? Điều này không thành vấn đề. Vui lòng cung cấp địa chỉ email của bạn, và chúng tôi sẽ gửi cho bạn một liên kết đặt lại mật khẩu qua email. Bạn có thể sử dụng liên kết này để chọn một mật khẩu mới.') }}</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="register-form">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4 btn-register">
            <x-primary-button>
                {{ __('Thay Đổi Mật Khẩu') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
