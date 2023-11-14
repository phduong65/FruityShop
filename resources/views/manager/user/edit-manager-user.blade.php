@extends('layouts.manager')
@section('manager_user')
    <div class="manager_content">
        <div class="manager_content-product">
            <div class="textbox">
                <h2>Edit User</h2>
                <a href="{{route('users.create')}}" class="btn btn-success">
                    <i class="fa-solid fa-plus"></i>
                </a>
            </div>
            <form class="" action=" {{ route('users.update', $user->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-edit-manager">
                    <div class="edit-input-names">
                        <label for="name" class="edit-mana-lable">Name</label>
                        <input required type="text" class="edit-input-name" id="name" name="name"  value="{{$user->name}}">
                    </div>
                    <div class="edit-input-emails">
                        <label for="email" class="edit-mana-lable">Email</label>
                        <input required type="email" class="edit-input-email" id="email" name="email"  value="{{$user->email}}">
                    </div>
                    <div class="edit-input-births">
                        <label for="birth" class="edit-mana-lable">Birth</label>
                        <input required type="date" class="edit-input-birth" id="birth" name="birth"  value="{{$user->userProfile->birth}}">
                    </div>
                    <div class="edit-input-phones">
                        <label for="phone" class="edit-mana-lable">Phone number</label>
                        <input required type="number" class="edit-input-phone" id="phone" name="phone"  value="{{$user->userProfile->phone}}">
                    </div>
                    <div class="edit-input-addresses">
                        <label for="address" class="edit-mana-lable">Address</label>
                        <input required type="text" class="edit-input-address" id="address" name="address"
                             value="{{$user->userProfile->address}}">
                    </div>
                    <div class="edit-input-intros">
                        <label for="intro" class="edit-mana-lable">Introduce</label>
                        <textarea class="edit-input-intro" name="introduce" id="intro" cols="30" rows="10">
                     {{$user->userProfile->introduce}}
                        </textarea>
                    </div>
                    <button type="submit" class="save-manager-user">Lưu</button>
                </div>
            </form>
        </div>

    </div>
@endsection
