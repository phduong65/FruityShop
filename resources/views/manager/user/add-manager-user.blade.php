@extends('layouts.manager')
@section('manager_user')
    <div class="manager_content">
        <div class="manager_content-product">
            <div class="textbox">
                <h2>Add New User</h2>
                <a href="" class="btn btn-success">
                    <i class="fa-solid fa-plus"></i>
                </a>
            </div>
            <form class="" action=" {{ route('users.store') }}" method="post">
                @csrf
                <div class="form-edit-manager">
                    <div class="edit-input-names">
                        <label for="name" class="edit-mana-lable">Name</label>
                        <input required pattern="[a-zA-Z\p{L}\d ]+" title="(Không nhập ký tự đặc biệt!)" type="text"
                            class="edit-input-name" id="name" name="name">
                    </div>
                    <div class="edit-input-emails">
                        <label for="email" class="edit-mana-lable">Email</label>
                        <input required type="email" class="edit-input-email" id="email" name="email">
                    </div>
                    <div class="edit-input-births">
                        <label for="birth" class="edit-mana-lable">Birth</label>
                        <input required type="date" class="edit-input-birth" id="birth" name="birth">
                    </div>
                    <div class="edit-input-phones">
                        <label for="phone" class="edit-mana-lable">Phone number</label>
                        <input required pattern="0[0-9]{9,10}" title="(Chỉ nhập số ĐT 10 hoặc 11 chữ số!)" type="tel"
                            class="edit-input-phone" id="phone" name="phone" oninput="validatePhone()">
                    </div>
                    <div class="edit-input-addresses">
                        <label for="address" class="edit-mana-lable">Address</label>
                        <input required type="text" class="edit-input-address" id="address" name="address"
                            maxlength="100">
                        <div id="address-error" class="error-message"></div>
                    </div>

                    <div class="edit-input-intros">
                        <label for="intro" class="edit-mana-lable">Introduce</label>
                        <textarea class="edit-input-intro" name="introduce" id="intro" cols="30" rows="10">
                        </textarea>
                    </div>
                    <button type="submit" id="saveManagerUserBtn"
                        class="save-manager-user">Thêm</button>
                </div>
            </form>
        </div>
    </div>
@endsection
