@props(['steps' => []])

<div class="site-record-book-slider mt-3">
    @foreach ($steps as $step)
        <div>
            <div class="site-record-book-box">
                <div class="number">{{ $step['number'] }}</div>
                <div class="date-box">
                    <span>{{ $step['label'] ?? '' }}</span>
                    <div class="date">{{ $step['date'] ?? '' }}</div>
                </div>
                <div class="dot"></div>
                <div class="lane"></div>
                <div class="title">{{ $step['title'] }}</div>
            </div>
        </div>
    @endforeach
</div>
