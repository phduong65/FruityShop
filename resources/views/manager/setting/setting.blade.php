@extends('layouts.manager')
@section('manager_setting')
    <div class="manager_content">
        <div class="manager_content-product">
            <div class="textbox">
                <h2>Setting</h2>
            </div>
            <form action="{{ route('setting.update', 1) }}" id="uploadForm-logo" class="form-setting" method="POST">
                @csrf
                @method('PUT')
                <div class="form-child-setting">
                    <h3>Title 1</h3>
                    <input maxlength="100" required style="width: 50%" class="edit-input-name" type="text" name="title1" id="title1"
                        value="{{ $setting->title1 }}">
                </div>
                <div class="form-child-setting">
                    <h3>Title 2</h3>
                    <input maxlength="100" required style="width: 50%" class="edit-input-name" type="text" name="title2"
                        id="title2"value="{{ $setting->title2 }}">
                </div>
                <div class="form-child-setting">
                    <h3>Title 3</h3>
                    <input maxlength="100" required style="width: 50%" class="edit-input-name" type="text" name="title3"
                        id="title3"value="{{ $setting->title3 }}">
                </div>
                <div class="form-child-setting">
                    <h3>Health & Nutrition</h3>
                    <textarea rows="10" maxlength="1000" required style="width: 50%" class="edit-input-name" type="text" name="description"
                        id="description">{{ $setting->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary save-setting">Lưu</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- ------------------ Thông báo thành công ! ------------------------------ --}}
    @if ($success = Session::get('success'))
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '{{ $success }}',
                showConfirmButton: false,
                timer: 3000
            })
        </script>
    @endif
@endsection
