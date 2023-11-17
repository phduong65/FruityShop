<!-- Modal thong tin dang nhap -->

<div class="modal modal-login-user">
    <div class="modal-container ct-2">
        <div class="modal-headers">
            <div class="modal-header">
                <h3>Chỉnh sửa chi tiết</h3>
            </div>
            <i id="X" class="fa-solid fa-xmark"></i>
        </div>
        <form action="{{ route('profile.edit', $user->id) }}" method="post">
            @csrf
            @method('GET')
            <ul class="form-list">
                <li id="input-email">
                    <label for="email">Email:</label>
                    <input required 
                    title="(Nhập đúng định dạng Email!)" type="email" name="email" id="email" class="form-control"
                        value="{{ $user->email }}">
                </li>
                <li id="total">
                    <span class="change-pw"><i class="fa-solid fa-arrow-right"></i>Đổi mật khẩu</span>
                </li>
            </ul>
            <div class="modal-footer">
                <span class="button-leave">Hủy</span>
                <button type="submit" class="button-save">Lưu</button>
            </div>
        </form>

    </div>
</div>


