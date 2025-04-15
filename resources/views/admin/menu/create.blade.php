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
    <form action="{{ route('admin.menu.store') }}" class="row" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="col-6">
            <div class="form-group">
                <label for="name">Tên</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
            </div>



            {{-- <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" name="slug" value="{{ old('slug') }}">
                    </div> --}}

            <div class="form-group">
                <label for="post">Bài viết</label>
                <select class="js-example-basic-single form-control" id="post" name="post">
                    <option value="">-------</option>
                    @foreach ($posts as $post)
                        <option value="{{ $post->title }}" data-slug="{{ $post->slug }}">
                            {{ $post->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="categories">Danh mục</label>
                <select class="js-example-basic-single form-control" name="categories" id="categories" style="width: 100%">
                    <option value="">-------</option>
                    @foreach ($categoryOptions as $id => $item)
                        <option value="{{ $id }}" data-slug="{{ $item['slug'] }}">{{ $item['title'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tags">Thẻ</label>
                <select class="js-example-basic-single form-control" id="tags" name="tags">
                    <option value="">-------</option>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->title }}" data-slug="{{ $tag->slug }}">
                            {{ $tag->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="path">Đường dẫn</label>
                <input type="text" required class="form-control" id="path" name="path" value="{{ old('path') }}">
            </div>

            <div class="form-group">
                <label for="parent_id">Menu cha</label>
                <select name="parent_id" class="form-control">
                    <option value="">Không có</option>
                    {!! MenuHelper::renderMenuOptions($menus, '', old('parent_id')) !!}
                </select>
            </div>

            <button class="btn btn-primary">Lưu</button>
        </div>






    </form>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>

        $(document).ready(function() {
            $('.js-example-basic-single').select2();

            var post = $('#post');
            var categories = $('#categories');
            var tags = $('#tags');
            var path = $('#path');

            function handleSelectChange(changedId) {
                const selects = ['#post', '#categories', '#tags'];
                const changedVal = $(changedId).val();

                // Nếu có chọn giá trị
                if (changedVal) {
                    selects.forEach(id => {
                        if (id !== changedId) {
                            // Chỉ disable cái khác và KHÔNG disable #categories
                            $(id).val('').trigger('change');
                            // $('#path').val($(changedId).find(':selected').data('slug'))
                        }
                    });


                }

                switch (changedId) {
                    case '#post':
                        // code block
                        var value = `/bai-viet/${$(changedId).find(':selected').data('slug')}`
                        path.val(value)
                        break;
                    case '#categories':
                        var value = `/danh-muc/${$(changedId).find(':selected').data('slug')}`
                        path.val(value)
                        break;
                    case '#tags':
                        var value = `/the/${$(changedId).find(':selected').data('slug')}`
                        path.val(value)
                        break;
                    default:
                        path.val('')
                }

                // Disable path nếu có giá trị trong bất kỳ select nào
                const hasSelection = $('#post').val() || $('#categories').val() || $('#tags').val();
                $('#path').prop('readonly', !!hasSelection);
            }

            $('#post, #categories, #tags').on('change', function() {
                handleSelectChange('#' + $(this).attr('id'));
            });

            // Gọi lại khi load trang (nếu có giá trị cũ)
            // $('#post, #categories, #tags').trigger('change');

        });
    </script>
@endpush
