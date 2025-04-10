@extends('admin.layout.app')

@push('heading')
    Chỉnh sửa thẻ
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
    <form action="{{ route('admin.tags.update', $tag->id) }}" class="p-5 bg-white" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Tên thẻ</label>
            <input type="text" class="form-control" name="title" value="{{ old('title', $tag->title) }}" required>
        </div>

        <div class="form-group">
            <label for="metaTitle">Meta Title</label>
            <input type="text" class="form-control" name="metaTitle"
                value="{{ old('metaTitle', $tag->metaTitle) }}">
        </div>

        {{-- <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="slug" value="{{ old('slug', $category->slug) }}">
        </div> --}}

        <div class="form-group">
            <label for="content">Nội dung</label>
            <textarea class="form-control" name="content">{{ old('content', $tag->content) }}</textarea>
        </div>

       

        <button class="btn btn-primary">Cập nhật thẻ</button>
    </form>
@endsection
