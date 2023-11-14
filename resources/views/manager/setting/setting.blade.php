@extends('layouts.manager')
@section('manager_setting')
    <style>
        .darkMode1 {
            background: #343541;
        }

        .darkMode2 {
            color: #ffffff;
        }

        .darkMode3 {
            background: #444654;
        }


        .modal-logo {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .modal-content-logo {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
        }

        #closeModalBtn {
            display: block;
            margin-top: 10px;
            cursor: pointer;
        }
    </style>
    {{--  modal  --}}
    <div class="modal-logo" id="imageModal">
        <div class="modal-content-logo">
            <form id="uploadForm-logo" action="" class="form-setting" method="POST"
                enctype="multipart/form-data">
               
                
                <button type="submit" class="btn btn-primary save-setting">Lưu</button>
            </form>
            <button id="closeModalBtn">Đóng</button>
        </div>
    </div>

    <div class="manager_content">
        <div class="manager_content-product">
            <div class="textbox">
                <h2>Setting</h2>
            </div>
            <form id="uploadForm-logo" class="form-setting" method="POST" enctype="multipart/form-data">
                @csrf
                @method('GET')
                <div class="form-child-setting">
                    <h3>Logo</h3>
                    <div class="logo-total">
                        <div class="logo-cover">
                            <img src="{{ URL::asset('img') }}/" alt="">
                        </div>
                        <div class="change-img">
                            <i id="changeImageBtn" class="fa-regular fa-image"></i>
                        </div>
                    </div>
                </div>
                <div class="form-child-setting">
                    <h3>Theme</h3>
                    <select name="" id="theme-select">
                        <option value="sys">System</option>
                        <option value="dark">Dark</option>
                        <option value="light">Light</option>
                    </select>
                </div>
                <div class="form-child-setting">
                    <h3>Language</h3>
                    <select name="" id="language-select">
                        <option value="en">English</option>
                        <option value="vi">Vietnamese</option>
                        <option value="es">Español</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary save-setting">Lưu</button>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('changeImageBtn').addEventListener('click', function() {
            document.getElementById('imageModal').style.display = 'block';
        });

        document.getElementById('closeModalBtn').addEventListener('click', function() {
            document.getElementById('imageModal').style.display = 'none';
        });
    </script>
@endsection
