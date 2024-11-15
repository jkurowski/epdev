@props(['items' => []])

<div class="card-header border-bottom card-nav">
    <nav class="nav">

        @foreach ($items as $item)
            <a class="nav-link {{ $item['active'] ? 'active' : '' }}" href="{{ $item['route'] }}">
                <span class="{{ $item['icon'] }}"></span>
                {{ $item['name'] }}
            </a>
        @endforeach

    </nav>
</div>
