@extends('admin.layout.app')
@push('heading')
    Đối tác - khách hàng
@endpush
@push('headingAdd')
    <a href="{{ route('admin.partners.create') }}" class=" btn  btn-primary shadow-sm d-flex align-items-center"
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
                <th style="width:15%"></th>
                <th>Tên</th>
                <th style="width:15%"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($partners as $partner)
                <tr>
                    <td><img src="{{ $partner->image ? '/' . imagePath()['partners']['path'] . '/' . $partner->image : getImage($partner->image) }}"
                        alt="" style="height: 80px;"></td>
                    <td>{{ $partner->name }}</td>
                    <td>
                        <a href="{{ route('admin.partners.edit', $partner) }}" class="btn btn-sm btn-primary">Sửa</a>
                        <form action="{{ route('admin.partners.destroy', $partner) }}" method="POST" class="d-inline">
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
        {{ $partners->links('admin.layout.partials.paginate') }}
    </div>
@endsection
