@extends('admin.layout.app')
@push('heading')
    Thêm danh mục
@endpush



@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.categories.store') }}" class="p-5 bg-white" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Tên danh mục</label>
            <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
        </div>

        <div class="form-group">
            <label for="metaTitle">Meta Title</label>
            <input type="text" class="form-control" name="metaTitle" value="{{ old('metaTitle') }}">
        </div>

        {{-- <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="slug" value="{{ old('slug') }}">
        </div> --}}

        <div class="form-group">
            <label for="content">Nội dung</label>
            <textarea class="form-control" name="content">{{ old('content') }}</textarea>
        </div>

        <div class="form-group">
            <label for="parentId">Danh mục cha</label>
            <select name="parentId" class="form-control">
                <option value="">Không có</option>
                {!! CategoryHelper::renderCategoryOptions($categories, '', old('parentId', $category->parentId ?? null)) !!}
            </select>
        </div>

        <button class="btn btn-primary">Tạo danh mục</button>
    </form>
@endsection
