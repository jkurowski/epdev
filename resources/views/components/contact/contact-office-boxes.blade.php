@props(['title' => '', 'offices' => []])

<div class="contact-office-boxes h-100">
    @if ($title)
        <div class="title mb-5" data-aos="fade">{{ $title }}</div>
    @endif

    <div class="row gy-5 gy-xl-0">
        @foreach ($offices as $index => $office)
            <div class="col-xl-6">
                <x-contact.contact-office-box :index="$index" :image="$office['image'] ?? null" :listTitle="$office['listTitle'] ?? ''" :location="$office['location'] ?? ''"
                    :phoneNumber="$office['phoneNumber'] ?? ''" :phoneNumberSecond="$office['phoneNumberSecond'] ?? ''" :email="$office['email'] ?? ''" :openingHours="$office['openingHours'] ?? []" />
            </div>
        @endforeach
    </div>
</div>
