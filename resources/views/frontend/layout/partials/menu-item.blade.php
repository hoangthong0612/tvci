<li class="{{ $menu->children->count() ? 'dropdown' : '' }}">
    <a href="{{ $menu->path ?? '#' }}">
        <span>{{ $menu->name }}</span>
        @if ($menu->children->count())
            <i class="bi bi-chevron-down toggle-dropdown"></i>
        @endif
    </a>

    @if ($menu->children->count())
        <ul>
            @foreach ($menu->children as $child)
                @include('frontend.layout.partials.menu-item', ['menu' => $child])
            @endforeach
        </ul>
    @endif
</li>
