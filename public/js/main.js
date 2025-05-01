document.addEventListener('DOMContentLoaded', function () {
    window.matchMedia('(min-width: 1400px)').matches &&
    AOS.init({
        offset: 50,
        duration: 1000,
        // once: true,
    });
    innerWidth<1199.98
    window.matchMedia('(max-width: 1399px)').matches &&
    AOS.init({
        offset: 120,
        duration: 1000,
        disable: () => window.matchMedia('(max-width: 990px)').matches,
        // once: true,
    });
});

// Easing
jQuery.easing.jswing=jQuery.easing.swing,jQuery.extend(jQuery.easing,{def:"easeInOutExpo",swing:function(e,n,u,i,r){return jQuery.easing[jQuery.easing.def](e,n,u,i,r)},easeInOutExpo:function(e,n,u,i,r){return 0===n?u:n===r?u+i:(n/=r/2)<1?i/2*Math.pow(2,10*(n-1))+u:i/2*(2-Math.pow(2,-10*--n))+u}});

document.addEventListener('DOMContentLoaded', function () {
    let slickSettings = {
        dots: false,
        arrows: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ],
        appendArrows: '#invest-arrows'
    };
    $('.investment-carousel').slick(slickSettings);

    let slickSettings1 = {
        dots: false,
        arrows: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ],
        appendArrows: '#invest-arrows-1'
    };
    $('.investment-carousel-1').slick(slickSettings1);

    let slickSettings2 = {
        dots: false,
        arrows: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ],
        appendArrows: '#invest-arrows-2'
    };
    $('.investment-carousel-2').slick(slickSettings2);
});

//
//
//
//

document.addEventListener('DOMContentLoaded', function () {
    const rangeSlider = document.getElementById('ap-range');

    if (rangeSlider) {
        const rangeMin = parseInt(rangeSlider.getAttribute('data-range-min'));
        const rangeMax = parseInt(rangeSlider.getAttribute('data-range-max'));
        const rangeMinInput = document.getElementById('ap-range-min');
        const rangeMaxInput = document.getElementById('ap-range-max');
        const form = document.getElementById('searchEstate');

        noUiSlider.create(rangeSlider, {
            start: [rangeMinInput.value, rangeMaxInput.value],
            connect: true,
            range: {
                min: rangeMin,
                max: rangeMax,
            },
            step: 1,
            tooltips: [true, true],
            format: {
                to: function (value) {
                    return Math.round(value) + ' m²';
                },
                from: function (value) {
                    return Number(value.replace(' m²', ''));
                },
            },
        });
        rangeSlider.noUiSlider.on('update', (values) => {
            const inputMin = document.getElementById('ap-range-min');
            const inputMax = document.getElementById('ap-range-max');
            updateRangeValues(inputMin, inputMax, values);
        });

        // Reset the slider when the form is reset
        if (form) {
            form.addEventListener('reset', function () {
                setTimeout(() => {
                    rangeSlider.noUiSlider.set([rangeMin, rangeMax]);
                }, 10); // Small timeout to ensure form inputs reset first
            });
        }
    }


});

document.addEventListener('DOMContentLoaded', function () {
    const rangeSlider = document.getElementById('ap-range-contact');

    if (rangeSlider) {
        const rangeMin = parseInt(rangeSlider.getAttribute('data-range-min'));
        const rangeMax = parseInt(rangeSlider.getAttribute('data-range-max'));
        const rangeMinInput = document.getElementById('ap-range-contact-min');
        const rangeMaxInput = document.getElementById('ap-range-contact-max');

        noUiSlider.create(rangeSlider, {
            start: [rangeMinInput.value, rangeMaxInput.value],
            connect: true,
            range: {
                min: rangeMin,
                max: rangeMax,
            },
            step: 1,
            tooltips: [true, true],
            format: {
                to: function (value) {
                    return Math.round(value) + ' m²';
                },
                from: function (value) {
                    return Number(value.replace(' m²', ''));
                },
            },
        });

        rangeSlider.noUiSlider.on('update', (values) => {
            const inputMin = document.getElementById('ap-range-contact-min');
            const inputMax = document.getElementById('ap-range-contact-max');
            updateRangeValues(inputMin, inputMax, values);
        });

    }
});
document.addEventListener("DOMContentLoaded", function () {
    const rangeSlider2 = document.getElementById('ap-range-contact2');

    if (rangeSlider2) {
        const rangeMin = parseInt(rangeSlider2.getAttribute('data-range-min2'));
        const rangeMax = parseInt(rangeSlider2.getAttribute('data-range-max2'));
        const rangeMinInput = document.getElementById('ap-range-contact-min2');
        const rangeMaxInput = document.getElementById('ap-range-contact-max2');

        noUiSlider.create(rangeSlider2, {
            start: [rangeMinInput.value, rangeMaxInput.value],
            connect: true,
            range: {
                min: rangeMin,
                max: rangeMax,
            },
            step: 1,
            tooltips: [true, true],
            format: {
                to: function (value) {
                    return Math.round(value) + ' m²';
                },
                from: function (value) {
                    return Number(value.replace(' m²', ''));
                },
            },
        });

        rangeSlider2.noUiSlider.on('update', (values) => {
            const inputMin = document.getElementById('ap-range-contact-min2');
            const inputMax = document.getElementById('ap-range-contact-max2');
            updateRangeValues(inputMin, inputMax, values);
        });

    }
});

function updateRangeValues(inputMin, inputMax, values) {
    const minValue = values[0];
    const maxValue = values[1];
    inputMin.value = Number(minValue.replace(' m²', ''));
    inputMax.value = Number(maxValue.replace(' m²', ''));
}

$(document).ready(function () {
    const slickSlidersLeft = document.querySelectorAll('.slick-slider-left');

    slickSlidersLeft.forEach((slider) => {
        const prevArrow = $(slider)
            .parent()
            .find(`.slick-slider-left-prev`)
            .get(0);
        const nextArrow = $(slider)
            .parent()
            .find(`.slick-slider-left-next`)
            .get(0);

        $(slider).slick({
            dots: false,
            infinite: true,
            speed: 250,
            rtl: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: $(prevArrow),
            nextArrow: $(nextArrow),
            responsive: [
                {
                    breakpoint: 767.98,
                    settings: {
                        slidesToShow: 1,
                        infinite: true,
                        centerMode: true,
                        slidesToScroll: 1,
                    },
                },
            ],
        });

        AOS.refresh();
    });

    const slickSlidersRight = document.querySelectorAll('.slick-slider-right');

    slickSlidersRight.forEach((slider) => {
        const prevArrow = $(slider)
            .parent()
            .find(`.slick-slider-right-prev`)
            .get(0);
        const nextArrow = $(slider)
            .parent()
            .find(`.slick-slider-right-next`)
            .get(0);

        $(slider).slick({
            dots: false,
            infinite: true,
            speed: 250,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: $(prevArrow),
            nextArrow: $(nextArrow),
            responsive: [
                {
                    breakpoint: 767.98,
                    settings: {
                        slidesToShow: 1,
                        infinite: true,
                        centerMode: true,
                        slidesToScroll: 1,
                    },
                },
            ],
        });

        AOS.refresh();
    });
});

//
// Slider for record book
//

document.addEventListener('DOMContentLoaded', function () {
    const siteRecordBookSliders = document.querySelectorAll(
        '.site-record-book-slider',
    );

    siteRecordBookSliders.forEach((slider, index) => {
        $(slider).slick({
            dots: false,
            infinite: true,
            arrows: false,
            speed: 250,
            slidesToShow: 6,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 4,
                        infinite: true,
                        slidesToScroll: 1,
                        arrows: true,
                    },
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 2,
                        infinite: true,
                        slidesToScroll: 1,
                        arrows: true,
                    },
                },
            ],
        });

        AOS.refresh();
    });
});

//
// Slider for single
//

document.addEventListener('DOMContentLoaded', function () {
    const singleSlider = document.querySelector('.single-slider');

    if (singleSlider) {
        $(singleSlider).slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            dots: false,
            infinite: true,
            speed: 250,
            prevArrow: $('.slick-slider-single-prev'),
            nextArrow: $('.slick-slider-single-next'),
        });

        AOS.refresh();
    }
});

//
// recommendation-slider
//

const recommendationSlider = document.querySelector('.recommendation-slider');
if (recommendationSlider) {
    $(document).ready(function () {
        $('.recommendation-slider').slick({
            dots: false,
            infinite: false,
            speed: 250,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: $('.slick-slider-left-prev'),
            nextArrow: $('.slick-slider-left-next'),
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1,
                        infinite: true,
                        centerMode: true,
                        slidesToScroll: 1,
                    },
                },
            ],
        });

        AOS.refresh();
    });
}

//
//
//
// Add non-breaking space after single letter
//
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('p').forEach(function (p) {
        p.innerHTML = p.innerHTML.replace(/ (\w) /g, ' $1&nbsp;');
    });
});

//
//
//
//
//
// Counter
//
//

class Counter {
    constructor(element, targetValue, duration = 1500) {
        this.element = element;
        this.targetValue = targetValue;
        this.duration = duration;
        this.startValue = 0;
        this.startTime = null;
    }

    animate = (currentTime) => {
        if (!this.startTime) this.startTime = currentTime;
        const progress = currentTime - this.startTime;
        const value = Math.min(
            this.startValue + (progress / this.duration) * this.targetValue,
            this.targetValue,
        );
        this.element.textContent = Math.floor(value);
        if (value < this.targetValue) {
            requestAnimationFrame(this.animate);
        }
    };

    start() {
        requestAnimationFrame(this.animate);
    }
}

const numbersArr = document.querySelectorAll('[data-number]');
if (numbersArr.length > 0) {
    const observerNumber = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const numberPattern = /\d+/g;
                    let number = entry.target.dataset.number;
                    let reg = number.match(numberPattern);
                    const counter = new Counter(entry.target, reg[0]);
                    counter.start();
                    observerNumber.unobserve(entry.target);
                }
            });
        },
        {
            rootMargin: '50px',
        },
    );
    numbersArr.forEach((element) => {
        observerNumber.observe(element);
    });
}

//
//
//
// Glightbox
//

document.addEventListener('DOMContentLoaded', () => {
    const lightbox = GLightbox({
        selector: '.glightbox',
    });
});



document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('#pills-tab .grid-btn');
    const pillsTab = document.getElementById('pills-tab');

    const elements = [{
        selector: '.apartments-titles',
        classToToggle: 'apartments-titles-hide'
    },
        {
            selector: '.apartment-box-container',
            classToToggle: 'switch'
        },
        {
            selector: '.ap-column-box',
            classToToggle: 'ap-column-switch'
        }
    ];

    function setColumnView() {
        tabs.forEach(t => t.classList.remove('active'));
        document.getElementById('column-tab').classList.add('active');

        elements.forEach(({
                              selector,
                              classToToggle
                          }) => {
            document.querySelectorAll(selector).forEach(element => {
                element.classList.add(classToToggle);
            });
        });
    }

    function setRowView() {
        tabs.forEach(t => t.classList.remove('active'));
        document.getElementById('row-tab').classList.add('active');

        elements.forEach(({
                              selector,
                              classToToggle
                          }) => {
            document.querySelectorAll(selector).forEach(element => {
                element.classList.remove(classToToggle);
            });
        });
    }

    function updateViewBasedOnScreenSize() {
        if (!pillsTab) return; // Exit the function if pillsTab does not exist

        if (window.innerWidth < 1199.98) {
            setColumnView();
            pillsTab.style.display = 'none';
        } else {
            pillsTab.style.display = 'flex';
        }
    }

    // Initial check on page load
    updateViewBasedOnScreenSize();

    // Listen to window resize event
    window.addEventListener('resize', updateViewBasedOnScreenSize);

    // Tab click handling
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            if (tab.id === 'column-tab') {
                setColumnView();
            } else if (tab.id === 'row-tab') {
                setRowView();
            }
        });
    });
});