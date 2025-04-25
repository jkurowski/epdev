@props([
    'day' => 'day',
    'time' => 'time'
])
<li class="pb-3 contact-box">
<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><g transform="translate(-1092 -6521)"><circle cx="16" cy="16" r="16" transform="translate(1092 6521)" fill="#d7007a"/><g transform="translate(1099.514 6528.514)"><path d="M8.486,0a8.486,8.486,0,1,0,8.486,8.486A8.482,8.482,0,0,0,8.486,0Zm.663,15.616v-.61a.663.663,0,1,0-1.326,0v.61A7.157,7.157,0,0,1,1.357,9.149h.61a.663.663,0,0,0,0-1.326h-.61A7.157,7.157,0,0,1,7.823,1.357v.61a.663.663,0,1,0,1.326,0v-.61a7.157,7.157,0,0,1,6.467,6.467h-.61a.663.663,0,1,0,0,1.326h.61a7.157,7.157,0,0,1-6.467,6.467Zm2.414-4.991a.663.663,0,0,1-.938.938L8.018,8.955a.663.663,0,0,1-.194-.469V4.575a.663.663,0,1,1,1.326,0V8.212Z" fill="#fff"/></g></g></svg>
<span class="location-info text-capitalize"><strong>{{ $day }}</strong> <br> {{ $time }}</span>
</li>