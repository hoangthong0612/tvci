<tr>
    <td>{{ $prefix }}{{ $menu->name }}</td>
    <td>{{ $menu->path }}</td>
    <td>{{ $menu->parent ? $menu->parent->name : '-' }}</td>
    <td>
        <a href="{{ route('admin.menu.edit', $menu) }}" class="btn btn-sm btn-primary">Sửa</a>
        <form action="{{ route('admin.menu.destroy', $menu) }}" method="POST" class="d-inline">
            @csrf @method('DELETE')
            <button onclick="return confirm('Bạn có chắc muốn xoá?')" class="btn btn-sm btn-danger">Xoá</button>
        </form>
    </td>
</tr>

{{-- Đệ quy children --}}
@foreach ($menu->children as $child)
    @include('admin.menu.row', ['menu' => $child, 'prefix' => $prefix . '— '])
@endforeach
