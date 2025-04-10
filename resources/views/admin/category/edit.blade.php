@extends('admin.layout.app')

@push('heading')
    Chỉnh sửa danh mục
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
    <form action="{{ route('admin.categories.update', $category->id) }}" class="p-5 bg-white" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Tên danh mục</label>
            <input type="text" class="form-control" name="title" value="{{ old('title', $category->title) }}" required>
        </div>

        <div class="form-group">
            <label for="metaTitle">Meta Title</label>
            <input type="text" class="form-control" name="metaTitle"
                value="{{ old('metaTitle', $category->metaTitle) }}">
        </div>

        {{-- <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="slug" value="{{ old('slug', $category->slug) }}">
        </div> --}}

        <div class="form-group">
            <label for="content">Nội dung</label>
            <textarea class="form-control" name="content">{{ old('content', $category->content) }}</textarea>
        </div>

        <div class="form-group">
            <label for="parentId">Danh mục cha</label>
            <select name="parentId" class="form-control">
                <option value="">Không có</option>
                {!! CategoryHelper::renderCategoryOptions($categories, '', old('parentId', $category->parentId)) !!}
            </select>
        </div>

        <button class="btn btn-primary">Cập nhật danh mục</button>
    </form>
@endsection
