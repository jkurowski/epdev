@if($list->count() > 0)
<div class="container gallery-ap mt-3 mb-5">
    <div class="row g-4 justify-content-center">
        @php
        $i = 0;
        @endphp
        @foreach ($list as $p)
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="gallery-ap--box" data-aos="fade-right" data-aos-delay="{{ $i * 100 }}">
                    <a href="/uploads/gallery/images/{{$p->file}}" data-gallery="gallery-gallery" class="glightbox ">
                        <picture>
                            <source type="image/webp" srcset="{{asset('uploads/gallery/images/thumbs/webp/'.$p->file_webp) }}">
                            <source type="image/jpeg" srcset="{{asset('uploads/gallery/images/thumbs/'.$p->file) }}">
                            <img src="{{asset('uploads/gallery/images/thumbs/'.$p->file) }}" alt="{{ $p->name }}" class="img-fluid gallery-ap--img">
                        </picture>

                        <div class="gallery-ap--date">
{{--                                <svg xmlns="http://www.w3.org/2000/svg" width="51.104" height="54.511" viewBox="0 0 51.104 54.511">--}}
{{--                                    <path id="Icon_metro-calendar" data-name="Icon metro-calendar"--}}
{{--                                          d="M19.605,22.37h6.814v6.814H19.605Zm10.221,0H36.64v6.814H29.826Zm10.221,0h6.814v6.814H40.047ZM9.385,42.811H16.2v6.814H9.385Zm10.221,0h6.814v6.814H19.605Zm10.221,0H36.64v6.814H29.826ZM19.605,32.59h6.814V39.4H19.605Zm10.221,0H36.64V39.4H29.826Zm10.221,0h6.814V39.4H40.047Zm-30.662,0H16.2V39.4H9.385ZM46.861,1.928V5.335H40.047V1.928H16.2V5.335H9.385V1.928H2.571V56.439h51.1V1.928H46.861Zm3.407,51.1H5.978V15.556h44.29Z"--}}
{{--                                          transform="translate(-2.571 -1.928)" fill="#fff" />--}}
{{--                                </svg>--}}
{{--                                <span>{{ $date }}</span>--}}
                        </div>
                    </a>
                </div>
            </div>
            @php
                $i++;
            @endphp
        @endforeach
    </div>
</div>
@endif