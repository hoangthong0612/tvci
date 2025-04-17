@push('style')
    <style>
        .list-group-item1 {
            border: none;
            padding-left: 0.5rem;
            padding-right: 0.5rem;
            background-color: #f8f9fa;
            border-radius: 6px;
            margin-bottom: 4px;
        }

        .list-group-item1>.list-group1 {
            border-left: 2px solid #0d6efd;
            margin-top: 0.5rem;
            padding-left: 1rem;
        }
    </style>
@endpush

<div class="list-group-item1">
    <div class="d-flex justify-content-between align-items-center">
        <div class="p-1">
            @if ($category->children->isNotEmpty())
                <i class="bi bi-folder2-open text-primary me-1"></i>
            @else
                <i class="bi bi-folder text-secondary me-1"></i>
            @endif
            <a class="d-inline bg-transparent" href="{{ route('category', $category->slug) }}">{{ $category->title }}</a>
        </div>

        
    </div>

    @if ($category->children->isNotEmpty())
        <div class="ms-3 mt-2">
            <div class="list-group1">
                @foreach ($category->children as $child)
                    @include('frontend.category.category-tree', ['category' => $child])
                @endforeach
            </div>
        </div>
    @endif
</div>
