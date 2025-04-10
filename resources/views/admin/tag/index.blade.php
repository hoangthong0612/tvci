@extends('admin.layout.app')
@push('heading')
    Thẻ
@endpush
@push('headingAdd')
    <a href="{{ route('admin.tags.create') }}" class=" btn  btn-primary shadow-sm d-flex align-items-center"
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
                <th>Tên thẻ</th>
                <th>Đường dẫn</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)
                <tr>
                    <td>{{ $tag->title }}</td>
                    <td>{{ $tag->slug }}</td>
                    <td>
                        <a href="{{ route('admin.tags.edit', $tag) }}" class="btn btn-sm btn-primary">Sửa</a>
                        <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST" class="d-inline">
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
        {{ $tags->links('admin.layout.partials.paginate') }}
    </div>
@endsection
