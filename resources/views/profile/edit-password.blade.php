<div class="modal modal-pw-user">
    <div class="modal-container ct-2">
        <div class="modal-headers">
            <div class="modal-header">
                <h3>Đổi mật khẩu</h3>
            </div>
            <i id="X" class="fa-solid fa-xmark"></i>
        </div>
        {{-- <form action="" method="post">
            @csrf
            @method('GET')
            <ul class="form-list">
                <li class="change">
                    <label for="password1">Nhập mật khẩu cũ:</label>
                    <input type="password" name="password-old" id="password1" class="form-control">
                </li>
                <li class="change">
                    <label for="password2">Nhập mật khẩu mới:</label>
                    <input type="password" name="password-new" id="password2" class="form-control">
                </li>
                <li class="change">
                    <label for="password3">Xác nhận lại mật khẩu:</label>
                    <input type="password" name="password-submit" id="password3" class="form-control">
                </li>
            </ul>
            <div class="modal-footer">
                
                <button type="submit" class="button-save">Lưu</button>
            </div>
        </form> --}}
        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('put')
            <ul class="form-list">
                <li>
                    <x-input-label for="current_password" :value="__('Nhập mật khẩu cũ:')" />
                    <x-text-input id="current_password" name="current_password" type="password"
                        class="mt-1 block w-full" autocomplete="current-password" />
                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                </li>

                <li>
                    <x-input-label for="password" :value="__('Nhập mật khẩu mới:')" />
                    <x-text-input id="password" name="password" type="password" class="mt-1 block w-full"
                        autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                </li>

                <li>
                    <x-input-label for="password_confirmation" :value="__('Xác nhận lại mật khẩu:')" />
                    <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                        class="mt-1 block w-full" autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                </li>
            </ul>
            <div class="modal-footer">
                <span class="button-leave">Hủy</span>
                <x-primary-button class="button-save">{{ __('Save') }}</x-primary-button>

                @if (session('status') === 'password-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
    </div>
</div>
