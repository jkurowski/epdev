@props([
    'text' => 'text'
])
<li class="pb-3 contact-box">
<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><g transform="translate(-234 -747)"><circle cx="16" cy="16" r="16" transform="translate(234 747)" fill="#d7007a"></circle><path d="M13.877,1.928A5.522,5.522,0,0,0,8.355,7.45c0,5.522,5.522,12.148,5.522,12.148S19.4,12.972,19.4,7.45a5.522,5.522,0,0,0-5.522-5.522Zm0,8.9A3.382,3.382,0,1,1,17.259,7.45,3.382,3.382,0,0,1,13.877,10.832Z" transform="translate(236.146 752.572)" fill="none" stroke="#fff" stroke-width="1"></path></g></svg>
<span class="location-info text-capitalize">{!! $text !!}</span>
</li>