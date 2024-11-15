<section class="margin-xs section-clip">
    <div class="container about-us">
        <div class="recommendation">
            <div class="row">
                <!-- TEXT -->
                <div class="col-12 col-lg-5 col-xl-4 d-flex">
                    <div class="d-flex flex-column gap-4">
                        <div class="title-container">
                            <div class="title-tag mb-2" data-aos="fade" data-aos-delay="150">
                                {{ $title }}
                            </div>
                            <h4 class="header-1" data-aos="fade-up">{{ $subtitle }}</h4>
                        </div>
                        <div class="text-container d-flex flex-column gap-3">
                            <p class="text-pretty paragraph" data-aos="fade-up" data-aos-delay="100">
                                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                tempor
                                invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                            </p>
                            <p class="text-pretty paragraph" data-aos="fade-up" data-aos-delay="100">
                                At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
                                no
                                sea takimata sanctus est Lorem ipsum dolor sit amet.
                            </p>
                        </div>
                        @if (!empty($buttonLink) && !empty($buttonText))
                            <a href="{{ $buttonLink }}" class="btn btn-primary btn-primary-big" data-aos="fade-up"
                                data-aos-delay="200">
                                {{ $buttonText }}
                            </a>
                        @endif
                    </div>
                </div>

                <!-- SLIDER -->
                <div class="col-12 col-lg-6 col-xl-7 offset-lg-1 px-0">
                    <div class="recommendation-slider">
                        {{ $slot }}
                    </div>
                    <div class="recommendation-slider-btns">
                        <button type="button" class="slick-slider-left-prev slick-prev" aria-label="Poprzedni slajd">
                            <svg xmlns="http://www.w3.org/2000/svg" width="7.675" height="13.979"
                                viewBox="0 0 7.675 13.979">
                                <path id="chevron_right_24dp_FILL0_wght100_GRAD0_opsz24"
                                    d="M1.371,6.99l6.3-6.3L6.99,0,0,6.99l6.99,6.99.685-.685Z" fill="currentColor">
                                </path>
                            </svg>
                        </button>
                        <button type="button" class="slick-slider-left-next slick-next" aria-label="Następny slajd">
                            <svg xmlns="http://www.w3.org/2000/svg" width="7.675" height="13.979"
                                viewBox="0 0 7.675 13.979">
                                <path id="chevron_right_24dp_FILL0_wght100_GRAD0_opsz24"
                                    d="M1.371,6.99l6.3-6.3L6.99,0,0,6.99l6.99,6.99.685-.685Z"
                                    transform="translate(7.675 13.979) rotate(180)" fill="currentColor"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
