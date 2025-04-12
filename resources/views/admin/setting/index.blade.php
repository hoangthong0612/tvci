@extends('admin.layout.app')
@push('heading')
    Cài đặt
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
    <form action="{{ route('admin.setting.store') }}" class="row" method="POST" enctype="multipart/form-data">
        @csrf


        <div class="col-6  bg-white p-3">
            <div class="form-group">
                <label for="company">Công ty</label>
                <input type="text" class="form-control" name="company"
                    value="{{ old('company', $setting ? $setting->company : '') }}" required>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Logo</label>
                <div class="d-flex justify-content-center">
                    <div class="payment-method-item">
                        <div class="payment-method-header d-flex flex-wrap">
                            <div class="thumb">
                                <div class="avatar-preview">
                                    <div class="profilePicPreview" id="profilePicPreview"
                                        style="background-image: url('{{ $setting->logo ? '/' . imagePath()['logoIcon']['path'] . '/' . $setting->logo : getImage($setting->logo) }}')">
                                    </div>
                                </div>
                                <div class="avatar-edit">
                                    <input type="file" name="logo" class="profilePicUpload" id="image"
                                        accept="image/*">
                                    <label for="image" class="bg-primary text-white"><i
                                            class="fas fa-pencil-alt"></i></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Favicon</label>
                <div class="d-flex justify-content-center">
                    <div class="payment-method-item">
                        <div class="payment-method-header d-flex flex-wrap">
                            <div class="thumb">
                                <div class="avatar-preview">
                                    <div class="profilePicPreview" id="profile1"
                                        style="background-image: url('{{ $setting->favicon ? '/' . imagePath()['favicon']['path'] . '/' . $setting->favicon : getImage($setting->favicon) }}')">
                                    </div>
                                </div>
                                <div class="avatar-edit">
                                    <input type="file" name="favicon" class="profilePicUpload" id="image1"
                                        accept="image/*">
                                    <label for="image1" class="bg-primary text-white"><i
                                            class="fas fa-pencil-alt"></i></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <button class="btn btn-primary">Lưu</button>

        </div>





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
                        var preview = $(input).parents('.thumb').find('#profilePicPreview');
                        $(preview).css('background-image', 'url(' + e.target.result + ')');
                        $(preview).addClass('has-image');
                        $(preview).hide();
                        $(preview).fadeIn(650);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            function proPicURL1(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var preview = $(input).parents('.thumb').find('#profile1');
                        console.log(preview);
                        $(preview).css('background-image', 'url(' + e.target.result + ')');
                        $(preview).addClass('has-image');
                        $(preview).hide();
                        $(preview).fadeIn(650);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("body").on('change', '#image', function() {
                proPicURL(this);
            });

            $("body").on('change', '#image1', function() {
                proPicURL1(this);
            });



        })(jQuery);
    </script>
@endpush
