  <!-- Modal -->
  <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Chỉnh sửa</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('category.update', $item->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="modal-body">
         
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Tên danh mục cũ:</label>
              <br>
              <p>{{$item->name}}</p>
            </div>
            <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Tên danh mục mới:</label>
              <input type="name" id="name" class="form-control" name="name">
              <span id="error" style="color: red;"></span>
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Cập nhập</button>
        </div>
        </form>
      </div>
    </div>
  </div>