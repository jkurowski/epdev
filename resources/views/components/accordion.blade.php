@props([
    'id' => 'accordionExample',
    'expandedIndex' => -1, // -1 means no item is expanded
    'items' => [
        [
            'title' => 'Accordion Item #1',
            'body' => 'This is the first item\'s accordion body. fsdf',
        ],
    ],
])

<div class="accordion" id="{{ $id }}">
    @foreach ($items as $item)
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{ $loop->index }}">
                <button
                    class="accordion-button"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapse{{ $loop->index }}"
                >
                    {{ $item['title'] }}
                </button>
            </h2>
            <div
                id="collapse{{ $loop->index }}"
                class="accordion-collapse {{ $expandedIndex === $loop->index ? 'show' : 'collapse' }}"
                data-bs-parent="#{{ $id }}"
            >
                <div class="accordion-body">
                    {{ $item['body'] }}
                </div>
            </div>
        </div>
    @endforeach
</div>
