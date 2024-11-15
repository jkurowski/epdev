@session('errors')
<div class="alert alert-danger my-4">
    <ul>
        @foreach (session('errors')->all() as $error)
            <li>
                {{ $error }}
            </li>
        @endforeach
    </ul>
</div>
@endsession