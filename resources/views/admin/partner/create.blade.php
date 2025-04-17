@extends('admin.layout.app')
@push('heading')
    Thêm đối tác - khách hàng
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
    <form action="{{ route('admin.partners.store') }}" class="p-5 bg-white" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Tên đối tác - khách hàng</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
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
                                <input type="file" name="image" class="profilePicUpload" id="image"
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
            <label for="description">Mô tả</label>
            <input type="text" class="form-control" name="description" value="{{ old('name') }}">
        </div>




        <button class="btn btn-primary">Lưu</button>
    </form>
@endsection

@push('script')
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



        })(jQuery);
    </script>
@endpush
