@extends('admin.layout.app')
@push('heading')
    Menu
@endpush

@push('headingAdd')
    <a href="{{ route('admin.menu.create') }}" class=" btn  btn-primary shadow-sm d-flex align-items-center"
        style="gap: 10px"><i class="fas fa-plus-square"></i> Thêm mới</a>
@endpush