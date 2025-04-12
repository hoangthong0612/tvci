@extends('frontend.layout.app')
@push('head-title')
    404 Not Found
@endpush
@section('content')
    <section id="hero" class="hero section h-100">
        <div class="container">
            <div class="text-center">
                <div class="error mx-auto" data-text="404">404</div>
                <p class="lead text-gray-800 mb-5">Không tìm thấy trang</p>
                <p class="text-gray-500 mb-0">Rất tiếc, trang bạn đang tìm kiếm không tồn tại hoặc đã bị xóa...</p>
                <a href="{{url()->previous()}}">&larr; Quay lại</a>
            </div>
        </div>
    </section>
@endsection
