<div class="modal modal-cover-user">
    <div class="modal-container ct-2">
        <div class="modal-headers">
            <div class="modal-header">
                <h3>Đổi ảnh bìa</h3>
            </div>
            <i id="X" class="fa-solid fa-xmark"></i>
        </div>
        <form action="{{ route('upload.cover', $user->userProfile->id ?? $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('GET')
            <div class="kien-flex-avatar">
                <div class="total-cover">
                    <img class="upload-cover1" src="{{URL::asset('img')}}/{{$user->userProfile->cover??"default_bia.png"}}" alt="">
                    <div class="upload-cover2 text-secondary">
                        <input type="file" name="cover" id="cover" class="image-kien-cover" accept="image/*">
                        <p>Choose file...</p>
                        <span>Kéo thả ảnh vào đây</span>
                        <i class="fa-solid fa-down-long icon-down"></i>
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
