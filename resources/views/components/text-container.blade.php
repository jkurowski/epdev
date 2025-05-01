<div class="d-flex flex-column gap-4">
    {{-- Check if titleTag or title exist, and display only if set --}}
    @if (!empty($titleTag) || !empty($title))
        <div class="title-container">
            @if (!empty($titleTag))
                <h1 class="title-tag mb-2" data-aos="fade" data-aos-delay="150">
                    {{ $titleTag }}
                </h1>
            @endif

            @if (!empty($title))
                <h1 class="header-1 mb-0" data-aos="fade-up">
                    {!! $title !!}
                </h1>
            @endif
        </div>
    @endif

    {{-- Check if paragraphs exist and display only if set --}}
    @if (!empty($paragraphs) && is_array($paragraphs))
        <div class="text-container d-flex flex-column gap-3 text-justify">
            @foreach ($paragraphs as $paragraph)
                <p class="paragraph" data-aos="fade-up" data-aos-delay="100">
                    {!! $paragraph !!}
                </p>
            @endforeach
        </div>
    @endif

    {{-- Check if link and buttonText exist to display the button --}}
    @if (!empty($link) && !empty($buttonText))
        <a href="{{ $link }}" class="btn btn-primary" data-aos="fade-up" data-aos-delay="200">
            {{ $buttonText }}
            <svg xmlns="http://www.w3.org/2000/svg" width="4.553" height="8.293" viewBox="0 0 4.553 8.293">
                <path d="M.813,4.147,4.553.406,4.147,0,0,4.147,4.147,8.293l.407-.407Z"
                    transform="translate(4.553 8.293) rotate(180)" fill="currentColor" />
            </svg>
        </a>
    @endif
</div>
