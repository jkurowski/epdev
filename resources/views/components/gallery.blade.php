@props([
    'items' => [], // Lista obrazów i ich szczegółów
])

<div class="custom-container gallery-ap">
    <div class="row g-4">
        {{-- Iteruj przez elementy galerii --}}
        @foreach ($items as $index => $item)
            <x-gallery-item :defaultSrc="asset('uploads/gallery/images/' . $item->file)" :date="$item->gallery_item_hover_date" :index="$index" :alt="$item['alt']" />
        @endforeach
    </div>
</div>
