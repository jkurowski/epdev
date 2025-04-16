@props(['property'])
<div class="col-12">

    @php
        $propertyLink = '';
        $DEV_FLOOR_ID = 1;
// @TODO: Zmienic floor_id
        switch ($investment->type) {
            case $investment->type == 1:
                $propertyLink = route('front.developro.property', [
                    'citySlug' => $investment->city->slug,
                    'slug' => $investment->slug,
                    'floor' => $property->floor ?? $DEV_FLOOR_ID,
                    'property' => $property->id,
                ]);
                break;
            case $investment->type == 2:
                $propertyLink = route('front.developro.property', [
                    'citySlug' => $investment->city->slug,
                    'slug' => $investment->slug,
                    'floor' => $property->floor ?? $DEV_FLOOR_ID,
                    'property' => $property->id,
                ]);
                break;
            case $investment->type == 3:
                $propertyLink = route('front.developro.house', [
                    'citySlug' => $investment->city->slug,
                    'slug' => $investment->slug,
                    'property' => $property->id,
                ]);
                break;
            default:
                $propertLink = '#';
        }
    @endphp


    <div class="ap-column-box ap-column-switch" data-aos="fade-right" data-aos-delay="100">
        @php
            switch ($property->status) {
                case 1:
                    $statusClass = ['class' => 'bg-success'];
                    break;
                case 2:
                    $statusClass = ['class' => 'bg-warning'];
                    break;
                case 3:
                case 5:
                case 6:
                    $statusClass = ['class' => 'bg-danger'];
                    break;
                default:
                    $statusClass = ['class' => 'bg-info'];
            }
        @endphp
        <!-- TAG -->
        <div>
            <div class="apartment-type apartment-hero-type {{ $statusClass['class'] }}">
                {{ roomStatus($property->status) }}
            </div>

        </div>

        <!-- PICTURE -->
        @php
            $image_url = '/investment/property/list/' . $property->file;
            if ($property->vox_id) {
                $image_url = $property->file . '.jpg';
            }
        @endphp

        <div>

            <a href="{{ $image_url }}" data-gallery="apartment-gallery" class="glightbox ap-column-glightbox">
                <x-picture :defaultSrc="$image_url" class="ap-column--img" />
            </a>
        </div>

        <!-- TITLE -->
        <div>
            <div class="apartment-title">{{ $property->name }}</div>
        </div>


        <div class="apartment-info-box">
            <!-- METERAGE -->
            @if ($property->area)
                <div>
                    <div class="info-row">
                        <div>Metraż: </div>
                        <span>{{ $property->area }} m<sup>2</sup></span>
                    </div>
                </div>
            @endif

            <!-- TYPE -->
                @if($property->balcony_area > 0)
                <div>
                    <div class="info-row">
                        <div>Balkon: </div>
                        <span>{!! $property->balcony_area ? $property->balcony_area . ' m<sup>2</sup>' : 'Nie' !!}</span>
                    </div>
                </div>
               @endif
            @if($property->terrace_area > 0)
                <div>
                    <div class="info-row">
                        <div>Taras: </div>
                        <span>{!! $property->terrace_area ? $property->terrace_area . ' m<sup>2</sup>' : 'Nie' !!}</span>
                    </div>
                </div>
            @endif
            <!-- LEVEL -->

           
                <div>
                    <div class="info-row">
                        <div>Piętro: </div>
                        <span>{{ $property->floor_id  ?? '-'}}</span>
                    </div>
                </div>
           


            {{-- ROOMS --}}
            @if ($property->rooms)
                <div>
                    <div class="info-row">
                        <div>Pokoje: </div>
                        <span>{{ $property->rooms }}</span>
                    </div>
                </div>
            @endif

        </div>
        <!-- PDF and Details Button -->
        <div class="d-flex ap-pdf-box">
            @if ($property->file_pdf)
                @php
                    $pdf_url = asset('/investment/property/pdf/' . $property->file_pdf);
                    if ($property->vox_id) {
                        $pdf_url = $property->file_pdf;
                    }
                @endphp
                <div class="pdf">
                    <a href="{{ $pdf_url }}" target="_blank" class="btn btn-underline">
                        <svg xmlns="http://www.w3.org/2000/svg" width="11.936" height="15.914"
                            viewBox="0 0 11.936 15.914">
                            <path d="M5.654,7.96A3,3,0,0,1,5.592,6.5C5.853,6.5,5.828,7.649,5.654,7.96ZM5.6,9.427a14.342,14.342,0,0,1-.883,1.949A11.445,11.445,0,0,1,6.673,10.7,4.026,4.026,0,0,1,5.6,9.427ZM2.676,13.306c0,.025.41-.168,1.085-1.25A4.3,4.3,0,0,0,2.676,13.306ZM7.708,4.973h4.227v10.2a.744.744,0,0,1-.746.746H.746A.744.744,0,0,1,0,15.168V.746A.744.744,0,0,1,.746,0H6.962V4.227A.748.748,0,0,0,7.708,4.973Zm-.249,5.34A3.12,3.12,0,0,1,6.133,8.641a4.468,4.468,0,0,0,.193-2A.778.778,0,0,0,4.84,6.434a5.168,5.168,0,0,0,.252,2.393,29.187,29.187,0,0,1-1.268,2.667s0,0-.006,0c-.842.432-2.288,1.383-1.694,2.114a.966.966,0,0,0,.668.311c.556,0,1.11-.559,1.9-1.921a17.717,17.717,0,0,1,2.456-.721,4.711,4.711,0,0,0,1.989.606.8.8,0,0,0,.612-1.349c-.432-.423-1.688-.3-2.288-.224Zm4.258-7.049L8.672.218A.745.745,0,0,0,8.144,0H7.957V3.979h3.979v-.19A.744.744,0,0,0,11.718,3.264ZM9.415,11.2c.127-.084-.078-.37-1.33-.28C9.238,11.41,9.415,11.2,9.415,11.2Z"
                                fill="#d7007a" />
                        </svg>
                        Pobierz PDF
                    </a>
                </div>
            @endif


            <div>
                <a href="{{ $propertyLink }}" class="btn btn-primary btn-ap-check">
                    Sprawdź
                    <svg xmlns="http://www.w3.org/2000/svg" width="4.553" height="8.293" viewBox="0 0 4.553 8.293">
                        <path d="M.813,4.147,4.553.406,4.147,0,0,4.147,4.147,8.293l.407-.407Z"
                            transform="translate(4.553 8.293) rotate(180)" fill="currentColor" />
                    </svg>
                </a>
            </div>

        </div>


        <a class="ap-column-box--a" href="{{ $propertyLink }}"></a>

    </div>
</div>
