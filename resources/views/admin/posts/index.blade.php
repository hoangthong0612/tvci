@extends('admin.layout.app')
@push('heading')
    Bài viết
@endpush

@push('headingAdd')
    <a href="{{ route('admin.posts.create') }}" class=" btn  btn-primary shadow-sm d-flex align-items-center"
        style="gap: 10px"><i class="fas fa-plus-square"></i> Thêm mới</a>
@endpush
@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-bordered">
        <thead class="bg-primary text-white">
            <tr>
                <th>
                </th>
                <th>Tiêu đề</th>
                <th>Đường dẫn</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>
                        <img src="/{{ $post->thumbnail ? imagePath()['blogs']['path'] . '/' . $post->thumbnail : getImage($post->thumbnail) }}"
                            alt="" style="height: 80px;">
                    </td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>
                        <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-sm btn-primary">Sửa</a>
                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Bạn có chắc muốn xoá?')"
                                class="btn btn-sm btn-danger">Xoá</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $posts->links('admin.layout.partials.paginate') }}
    </div>
@endsection
