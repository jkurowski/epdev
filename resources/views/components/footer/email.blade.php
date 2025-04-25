@props([
    'address' => 'address'
])
<li class="pb-3 contact-box email">
    <a class="nav-link" href="mailto:{{ $address }}" aria-label="skontaktuj się z nami">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><g transform="translate(-1209 -6117)"><g transform="translate(117 435)"><circle cx="16" cy="16" r="16" transform="translate(1092 5682)" fill="#d7007a"></circle><g transform="translate(1100.921 5692.337)"><path d="M4.416,6H15.742a1.42,1.42,0,0,1,1.416,1.416v8.495a1.42,1.42,0,0,1-1.416,1.416H4.416A1.42,1.42,0,0,1,3,15.911V7.416A1.42,1.42,0,0,1,4.416,6Z" transform="translate(-3 -6)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"></path><path d="M17.158,9l-7.079,4.955L3,9" transform="translate(-3 -7.584)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"></path></g></g></g></svg>
        {{ $address }}
    </a>
</li>