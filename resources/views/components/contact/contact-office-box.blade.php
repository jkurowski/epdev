@props([
    'image' => [],
    'listTitle' => '',
    'location' => '',
    'phoneNumber' => '',
    'phoneNumberSecond' => '',
    'email' => '',
    'index' => 0,
    'openingHours' => [],
])

<div class="contact-office-box" data-aos="fade-right" data-aos-delay="{{ $index * 50 }}">
    <div class="row h-100">
        {{-- Image Section --}}
        <div class="d-none d-md-block col-md-4">
            <x-picture :webpSmall="$image['webpSmall']" :webpLarge="$image['webpLarge']" :pngSmall="$image['pngSmall']" :pngLarge="$image['pngLarge']" :defaultSrc="$image['defaultSrc']"
                :alt="$image['alt'] ?? ''" class="img-fluid contact-office-image" />
        </div>

        {{-- Contact Information Section --}}
        <div class="col-12 col-md-8">
            <div class="contact-office-info">
                <x-contact-list :listTitle="$listTitle" :location="$location" :phoneNumber="$phoneNumber" :phoneNumberSecond="$phoneNumberSecond"
                    :email="$email" :openingHours="$openingHours" />
            </div>
        </div>
    </div>
</div>
