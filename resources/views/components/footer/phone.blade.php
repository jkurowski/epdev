@props([
    'number' => 'number'
])
<li class="pb-3 contact-box phone">
    <a class="nav-link" href="tel:{{ str_replace(' ', '', $number) }}" aria-label="Zadzwoń">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
            <g transform="translate(-1209 -6066)">
                <circle cx="16" cy="16" r="16" transform="translate(1209 6066)" fill="#d7007a"></circle>
                <path d="M18.084,14.19v2.25a1.5,1.5,0,0,1-1.635,1.5,14.843,14.843,0,0,1-6.473-2.3,14.625,14.625,0,0,1-4.5-4.5,14.843,14.843,0,0,1-2.3-6.5A1.5,1.5,0,0,1,4.666,3h2.25a1.5,1.5,0,0,1,1.5,1.29A9.63,9.63,0,0,0,8.941,6.4,1.5,1.5,0,0,1,8.6,7.98l-.953.953a12,12,0,0,0,4.5,4.5l.953-.953a1.5,1.5,0,0,1,1.583-.338,9.63,9.63,0,0,0,2.108.525,1.5,1.5,0,0,1,1.29,1.523Z" transform="translate(1214.332 6071.5)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"></path>
            </g>
        </svg>
        {{ $number }}
    </a>
</li>