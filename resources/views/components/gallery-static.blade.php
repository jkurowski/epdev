@props([
    'items' => [], // Lista obrazów i ich szczegółów
])

<div class="custom-container gallery-ap">
    <div class="row g-4">
        {{-- Iteruj przez elementy galerii --}}
        @foreach ($items as $index => $item)
            <x-gallery-item :webpSmall="$item['webpSmall']" :webpLarge="$item['webpLarge']" :pngSmall="$item['pngSmall']" :pngLarge="$item['pngLarge']" :defaultSrc="$item['defaultSrc']"
                :date="$item['date']" :index="$index" />
        @endforeach

    </div>
</div>
