 <!-- Modal thong tin ca nhan -->
 <div class="modal modal-info-user">
     <div class="modal-container ct-1">
         <div class="modal-headers">
             <div class="modal-header">
                 <h3>Chỉnh sửa chi tiết</h3>
             </div>
             <i id="X" class="fa-solid fa-xmark"></i>
         </div>
         <form action="{{ route('profile.update', $user->userProfile->id ?? $user->id) }} " method="post">
             @csrf
             @method('PUT')
             <ul class="form-list">
                 <li>
                     <label for="name">Họ và tên:</label>
                     <input required type="text" name="name" id="name" class="form-control"
                         value="{{ $user->userProfile->name ?? $user->name }}">
                 </li>
                 <li>
                     <label for="phone">Số điện thoại:</label>
                     <input required  type="number" name="phone" id="phone" class="form-control"
                         value="{{ $user->userProfile->phone ?? '' }}">
                 </li>
                 <li>
                     <label for="age">Năm sinh:</label>
                     <input required type="date" name="birth" id="birth" class="form-control"
                         value="{{ $user->userProfile->birth ?? '' }}">
                 </li>
                 <li>
                     <label for="address">Địa chỉ:</label>
                     <input required type="text" name="address" id="address" class="form-control"
                         value="{{ $user->userProfile->address ?? '' }}">
                 </li>
                 <li>
                     <label for="introduce">Giới thiệu bản thân:</label>
                     <textarea  name="introduce" id="introduce" class="form-control" rows="5">{{ $user->userProfile->introduce ?? '' }}</textarea>
                 </li>
             </ul>
             <div class="modal-footer">
                 <span class="button-leave">Hủy</span>
                 <button type="submit" class="button-save">Lưu</button>
             </div>
         </form>

     </div>
 </div>
