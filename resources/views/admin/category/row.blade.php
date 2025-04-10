<tr>
    <td>{{ $prefix }}{{ $category->title }}</td>
    <td>{{ $category->slug }}</td>
    <td>{{ $category->parent ? $category->parent->title : '-' }}</td>
    <td>
        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-primary">Sửa</a>
        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline">
            @csrf @method('DELETE')
            <button onclick="return confirm('Bạn có chắc muốn xoá?')" class="btn btn-sm btn-danger">Xoá</button>
        </form>
    </td>
</tr>

{{-- Đệ quy children --}}
@foreach ($category->children as $child)
    @include('admin.category.row', ['category' => $child, 'prefix' => $prefix . '— '])
@endforeach
