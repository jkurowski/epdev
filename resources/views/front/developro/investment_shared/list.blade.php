<div id="mieszkania">
    <div class="container">
        <!-- BUTTONS -->
        <div class="row">
            <div class="col d-flex justify-content-end">
                <ul class="nav nav-pills gap-3 mb-3" id="pills-tab" role="tablist" data-aos="fade" data-aos-delay="200">
                    <!-- ROW -->
                    <li class="grid-btn"
                        id="row-tab"
                        role="tab"
                        aria-controls="row-tab"
                        aria-selected="true"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="53" height="28" viewBox="0 0 53 28"><g transform="translate(-1521 -3777)"><g transform="translate(-73 -32)"><g transform="translate(1594 3831)" fill="none" stroke="#000" stroke-width="1"><rect width="53" height="6" rx="2" stroke="none"/><rect x="0.5" y="0.5" width="52" height="5" rx="1.5" fill="none"/></g><g transform="translate(1594 3820)" fill="none" stroke="#000" stroke-width="1"><rect width="53" height="6" rx="2" stroke="none"/><rect x="0.5" y="0.5" width="52" height="5" rx="1.5" fill="none"/></g><g transform="translate(1594 3809)" fill="none" stroke="#000" stroke-width="1"><rect width="53" height="6" rx="2" stroke="none"/><rect x="0.5" y="0.5" width="52" height="5" rx="1.5" fill="none"/></g></g></g></svg>
                    </li>
                    <!-- COLUMN -->
                    <li class="grid-btn active"
                        id="column-tab"
                        role="tab"
                        aria-controls="column-tab"
                        aria-selected="false"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="39" height="28" viewBox="0 0 39 28"><g transform="translate(-1594 -3777)"><g transform="translate(1594 3793)" fill="none" stroke="#000" stroke-width="1"><rect width="11" height="12" rx="2" stroke="none"/><rect x="0.5" y="0.5" width="10" height="11" rx="1.5" fill="none"/></g><g transform="translate(1594 3777)" fill="none" stroke="#000" stroke-width="1"><rect width="11" height="12" rx="2" stroke="none"/><rect x="0.5" y="0.5" width="10" height="11" rx="1.5" fill="none"/></g><g transform="translate(1608 3793)" fill="none" stroke="#000" stroke-width="1"><rect width="11" height="12" rx="2" stroke="none"/><rect x="0.5" y="0.5" width="10" height="11" rx="1.5" fill="none"/></g><g transform="translate(1608 3777)" fill="none" stroke="#000" stroke-width="1"><rect width="11" height="12" rx="2" stroke="none"/><rect x="0.5" y="0.5" width="10" height="11" rx="1.5" fill="none"/></g><g transform="translate(1622 3793)" fill="none" stroke="#000" stroke-width="1"><rect width="11" height="12" rx="2" stroke="none"/><rect x="0.5" y="0.5" width="10" height="11" rx="1.5" fill="none"/></g><g transform="translate(1622 3777)" fill="none" stroke="#000" stroke-width="1"><rect width="11" height="12" rx="2" stroke="none"/><rect x="0.5" y="0.5" width="10" height="11" rx="1.5" fill="none"/></g></g></svg>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row gy-3 apartment-box-container switch">
            @if ($properties->count() > 0)
                @foreach ($properties as $room)
                    @php
                        $investment = $room->investment;
                    @endphp
                    @include('components.apartment-box', ['property' => $room])
                @endforeach
                {{ $properties->links() }}
            @else
                <div class="row">
                    <div class="col-12 text-center">
                        <b>Brak wyników</b>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
