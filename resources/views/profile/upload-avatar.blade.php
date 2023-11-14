<div class="modal modal-avatar-user">
    <div class="modal-container container-2 ct-2">
        <div class="modal-headers">
            <div class="modal-header">
                <h3>Đổi ảnh đại diện</h3>
            </div>
            <i id="X" class="fa-solid fa-xmark"></i>
        </div>
        <form action="{{ route('profile.show', $user->userProfile->id ?? $user->id) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('GET')
            <div class="kien-flex-avatar">
                <div class="default-user">
                    <img src="{{ URL::asset('img') }}/{{$user->userProfile->avatar ?? "default_user.png"}}" alt="" class="preview_img">
                </div>
                <div class="upload-user">
                    <div class="file-upload text-secondary">
                        <input type="file" name="avatar" id="avatar" class="image-kien" accept="image/*">
                        <span class="">Choose file...</span>
                        <span>Kéo thả ảnh vào đây</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <span class="button-leave">Hủy</span>
                <button type="submit" class="button-save">Lưu</button>
            </div>
        </form>
    </div>
</div>
