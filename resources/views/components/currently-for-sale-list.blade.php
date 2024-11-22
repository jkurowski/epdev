@props(['items' => []])

<div class="row gx-4 gy-5">
    @foreach ($items as $item)
 
        <x-currently-for-sale-box :file_thumb="$item->file_thumb"
            :alt="$item->name" :subtitle="$item->city->name" :title="$item->name" :link="route('front.developro.show', ['citySlug' => $item->city->slug, 'slug' => $item->slug])" />
    @endforeach
</div>
