@extends('frontend.layout.app')
@push('head-title')
    Đối tác - Khách hàng
@endpush
@section('content')
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/blogs/blog-3/assets/css/blog-3.css">
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container">
            <h1>Đối tác - Khách hàng</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('index') }}">Trang chủ</a></li>
                    {{-- <li class="current">Bài viết</li> --}}
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    {{-- <div class="tree">
        <ul class="list-unstyled">
          <li>
            <span class="toggle-icon" data-bs-toggle="collapse" data-bs-target="#cat1"><i class="bi bi-caret-right-fill"></i></span>
            <a href="/danh-muc-1" class="category-link">Danh mục 1</a>
            <ul class="collapse show" id="cat1">
              <li>
                <a href="/danh-muc-1-1" class="category-link">Danh mục con 1.1</a>
              </li>
              <li>
                <span class="toggle-icon" data-bs-toggle="collapse" data-bs-target="#cat1-2"><i class="bi bi-caret-right-fill"></i></span>
                <a href="/danh-muc-1-2" class="category-link">Danh mục con 1.2</a>
                <ul class="collapse" id="cat1-2">
                  <li><a href="/danh-muc-1-2-1" class="category-link">Danh mục con 1.2.1</a></li>
                  <li><a href="/danh-muc-1-2-2" class="category-link">Danh mục con 1.2.2</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li>
            <span class="toggle-icon" data-bs-toggle="collapse" data-bs-target="#cat2"><i class="bi bi-caret-right-fill"></i></span>
            <a href="/danh-muc-2" class="category-link">Danh mục 2</a>
            <ul class="collapse" id="cat2">
              <li><a href="/danh-muc-2-1" class="category-link">Danh mục con 2.1</a></li>
              <li><a href="/danh-muc-2-2" class="category-link">Danh mục con 2.2</a></li>
            </ul>
          </li>
        </ul>
      </div> --}}
    <section class="py-3 py-md-5">

        <div class="container overflow-hidden">
            <h3>- Phòng thí nghiệm vật liệu tính năng kĩ thuật cao( Hi-Techlom):</h3>
            <p class="mt-3">Ban QLDA Nhà máy Thủy điện Sơn LaBan Quản lý Dự án Đường sắt Khu vực IBan QLDA Đường Sắt – Tổng
                cục Đường SắtCông ty SGS Việt NamCông ty Cơ khí Điện Thủy lợiCông ty Kỹ thuật Điện Quảng Đông - Trung
                QuốcCông ty Lilama 10Công ty Đóng tầu Than Việt Nam, Nhà máy Đóng tầu Hà Nội, Nhà máy Đóng tầu Nam HàCông ty
                Tuyển Than Cửa Ông - VinacominCông ty Công nghiệp Hải ÂuCông ty Cơ khí Duyên HảiCông ty Nhiệt điện Cao Ngạn
                - VinacominCông ty Nhiệt điện Na Dương - VinacominCông ty Xây dựng và chuyển giao công nghệ Thủy Lợi </p>

            <h3>- Phòng thử nghiệm hiệu suất năng lượng :</h3>
            <p class="mt-3">Các hãng điều hòa, tủ lạnh :</p>
            <div class="row mt-3">
                @forelse ($partners as $partner)
                    <div class="col-6 col-lg-3">
                        <img src="{{ $partner->image ? '/' . imagePath()['partners']['path'] . '/' . $partner->image : getImage($partner->image) }}"
                            alt="" class="w-100" style="aspect-ratio: 16/9; object-fit: contain;">
                    </div>
                @empty
                @endforelse

            </div>
        </div>
    </section>
@endsection
