@extends('layouts.manager')
@section('title', 'Manage Post')
@section('manager_post')
    @if ($success = Session::get('success'))
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '{{ $success }}',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
    <div class="manager_content">
        <div class="manager_content-product">
            <div class="textbox">
                <h2>Manager Post</h2>
                <a href="{{ route('posts.create') }}" class="btn btn-success">
                    <i class="fa-solid fa-plus"></i>
                </a>
            </div>
            <table id="table_product-manage">
                <thead>
                    <tr>
                        <td class="mw50">Id</td>
                        <td class="mw120">Photo</td>
                        <td>Title</td>
                        <td>Content</td>
                        <td class="mw120">Post Status</td>
                        <td class="mw120">Post Featured</td>
                        <td class="mw200">Comment Status</td>
                        <td class="mw120">View</td>
                        <td>Action</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($post as $item)
                        <tr>
                            <td class="mw50">{{ $item->id }}</td>
                            <td class="mw120 customimage">
                                <div class="thumnail">
                                    <img src="{{ asset('uploads/post/' . $item->photo) }}" alt="" width="100px"
                                        style="object-fit: cover;max-height:100px;">
                                </div>
                            </td>
                            <td style="text-align: left;">{{ $item->title }}</td>
                            <td class="mw400"><?php echo html_entity_decode($item->content); ?></td>
                            <td class="mw120 status">
                                <p class="{{ $item->post_status }}"><span
                                        class="circle"></span><span>{{ $item->post_status }}</span>
                                </p>
                            </td>
                            <td class="mw120 outstand">
                                <p class="{{ $item->post_outstand }}"><span
                                        class="circle"></span><span>{{ $item->post_outstand }}</span></p>
                            </td>
                            <td class="mw200 outstand">
                                <p class="{{ $item->comment_status }}"><span
                                        class="circle"></span><span>{{ $item->comment_status }}</span></p>
                            </td>
                            <td class="mw120">{{ $item->view }}</td>
                            <td class="item">
                                <a href="{{ route('posts.edit', $item->id) }}" class="btn btn-warning">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('posts.destroy', $item->id) }}" method="POST"
                                    onsubmit="return questionDelete(event)" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="customnav">
                {{ $post->links() }}
            </div>
        </div>
    </div>
@endsection
