@extends('admin.layout.app')
@push('heading')
    Thêm bài viết
@endpush
@push('head')
    {{-- <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script> --}}
    <script src="{{ asset('assets/be/vendor/ckeditor/ckeditor.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Add if you use premium features. -->
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
    <form action="{{ route('admin.posts.store') }}" class="row" method="POST" enctype="multipart/form-data">
        @csrf


        <div class="col-12 col-lg-8 bg-white p-3">
            <div class="form-group">
                <label for="title">Tiêu đề</label>
                <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
            </div>

            <div class="form-group">
                <label for="summary">Nội dung</label>
                <input type="text" class="form-control" name="summary" value="{{ old('summary') }}">
            </div>


            {{-- <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" name="slug" value="{{ old('slug') }}">
                </div> --}}

            <div class="form-group">
                <label for="content">Mô tả</label>
                <textarea class="form-control" name="content" id="content">{{ old('content') }}</textarea>
            </div>
        </div>
        <div class="col-12 col-lg-4 bg-white p-3">
            <div class="d-flex justify-content-between">
                <div class="custom-control custom-switch  ">
                    <input type="checkbox" class="custom-control-input" id="published" name="published" value="1"
                        checked>
                    <label class="custom-control-label" for="published">Công khai</label>
                </div>
                <button class="btn btn-primary">Lưu</button>
            </div>



            <div class="mb-3">
                {{-- <label for="name" class="form-label">Tiêu đề</label> --}}
                <div class="d-flex justify-content-center">
                    <div class="payment-method-item">
                        <div class="payment-method-header d-flex flex-wrap">
                            <div class="thumb">
                                <div class="avatar-preview">
                                    <div class="profilePicPreview"
                                        style="background-image: url({{ asset('assets/images/default.jpg') }})">
                                    </div>
                                </div>
                                <div class="avatar-edit">
                                    <input type="file" name="thumbnail" class="profilePicUpload" id="image"
                                        accept="image/*">
                                    <label for="image" class="bg-primary text-white"><i
                                            class="fas fa-pencil-alt"></i></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="categories">Danh mục</label>
                <select class="js-example-basic-single form-control" name="categories[]" multiple="multiple"
                    style="width: 100%">
                    @foreach ($categoryOptions as $id => $title)
                        <option value="{{ $id }}">{{ $title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tags">Thẻ</label>
                <select class="js-example-basic-single form-control" id="tags" name="tags[]" multiple="multiple">

                </select>
            </div>
        </div>




    </form>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        CKEDITOR.replace('content', {
            filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });

        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

    <script>
        "use strict";
        (function($) {
            function proPicURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var preview = $(input).parents('.thumb').find('.profilePicPreview');
                        $(preview).css('background-image', 'url(' + e.target.result + ')');
                        $(preview).addClass('has-image');
                        $(preview).hide();
                        $(preview).fadeIn(650);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("body").on('change', '.profilePicUpload', function() {
                proPicURL(this);
            });

            $(document).ready(function() {
                $('#tags').select2({
                    tags: true, // Cho phép nhập tag mới
                    tokenSeparators: [',', ' '],
                    placeholder: "",
                    data: {!! json_encode($tags->map(fn($tag) => ['id' => $tag->title, 'text' => $tag->title])) !!}
                });
            });

        })(jQuery);
    </script>
@endpush
