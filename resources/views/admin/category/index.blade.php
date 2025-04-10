@extends('admin.layout.app')
@push('heading')
    Danh mục
@endpush
@push('headingAdd')
    <a href="{{ route('admin.categories.create') }}" class=" btn  btn-primary shadow-sm d-flex align-items-center"
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
                <th>Tên danh mục</th>
                <th>Đường dẫn</th>
                <th>Danh mục cha</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                @include('admin.category.row', ['category' => $category, 'prefix' => ''])
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $categories->links('admin.layout.partials.paginate') }}
    </div>
@endsection
