<div class="main-search-box">
    <div class="title">Znajdź mieszkanie<br>dla siebie</div>
    <div>
        <form action="{{route('front.developro.properties')}}" method="GET">
          
            {{-- Dropdown for city selection --}}
            <div class="d-flex flex-column">
                <label class="subtitle mt-4 mb-3">MIASTO</label>
                <div id="citySearch" class="dropdown dropdown-search">
                    <button class="btn btn-secondary dropdown-toggle d-flex justify-content-between align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span>Wybierz z listy</span>
                        <span class="ms-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
                            </svg>
                        </span>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <span class="dropdown-item">Wszystkie</span>
                            <input type="radio" name="apartments-city" id="input-all" value="" class="d-none">
                        </li>
                        @foreach ($active_cities as $city)
                            <li>
                                <span class="dropdown-item" data-slug="{{ $city->slug }}">{{ $city->name }}</span>
                                <input type="radio" name="apartments-city" id="input-{{ $city->slug }}" value="{{ $city->slug }}" class="d-none">
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="d-flex flex-column">
                <label class="subtitle mt-4 mb-3">INWESTYCJA</label>
                <div id="investmentSearch" class="dropdown dropdown-search">
                    <button class="btn btn-secondary dropdown-toggle d-flex justify-content-between align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span>Wybierz z listy</span>
                        <span class="ms-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
                            </svg>
                        </span>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <span class="dropdown-item">Wszystkie</span>
                            <input type="radio" name="apartments-invest" id="invest-all" value="" class="d-none">
                        </li>
                        @foreach ($active_investments as $i)
                            <li data-city="{{ $i->city ? $i->city->slug : '' }}">
                                <span class="dropdown-item" data-slug="{{ $i->slug }}">{{ $i->name }}</span>
                                <input type="radio" name="apartments-invest" id="invest-{{ $i->slug }}" value="{{ $i->slug }}" class="d-none">
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="subtitle mt-4 mb-3">LICZBA POKOI</div>
            <div class="d-flex">
                {{-- Checkboxes for apartment levels --}}
                <div class="levels-box">
                    @for ($i = 1; $i <= $levels; $i++)
                        <input type="radio"
                               id="level{{ $i }}"
                               class="level-input"
                               name="rooms"
                               value="{{ $i }}" {{ request('rooms') == $i ? 'checked' : '' }}
                        >
                        <label for="level{{ $i }}" class="level-label">
                            <span class="level-name">{{ $i }}</span>
                        </label>
                    @endfor
                </div>
            </div>

            {{-- Dual handle range slider --}}
            <div class="subtitle mt-4 mb-3">METRAŻ</div>
            <div id="ap-range" data-range-min="{{ $minRoomArea }}" data-range-max="{{ $maxRoomArea }}"></div>
            <input type="hidden" name="area-min" id="ap-range-min" value="{{ request('area-min') ?? $minRoomArea }}">
            <input type="hidden" name="area-max" id="ap-range-max" value="{{ request('area-max') ?? $maxRoomArea }}">

            {{-- Search button --}}
            <button class="mt-3 btn btn-primary" type="submit">
                ZNAJDŹ MIESZKANIE
                <svg xmlns="http://www.w3.org/2000/svg" width="4.553" height="8.293" viewBox="0 0 4.553 8.293"><path d="M.813,4.147,4.553.406,4.147,0,0,4.147,4.147,8.293l.407-.407Z" transform="translate(4.553 8.293) rotate(180)" fill="currentColor"></path></svg>
            </button>
        </form>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const levelRadios = document.querySelectorAll('.levels-box .level-input');
        let lastCheckedRadio = null;

        levelRadios.forEach(radio => {
            radio.addEventListener('click', function (event) {
                if (lastCheckedRadio === this) {
                    this.checked = false;
                    lastCheckedRadio = null;
                } else {
                    lastCheckedRadio = this;
                }
            });
        });

        function updateInvestments(selectedCity) {
            document.querySelectorAll("#investmentSearch .dropdown-menu li").forEach(li => {
                let citySlug = li.getAttribute("data-city");

                if (!citySlug || selectedCity === "" || citySlug === selectedCity) {
                    li.style.display = "block";
                } else {
                    li.style.display = "none";
                }
            });

            let investmentButton = document.querySelector("#investmentSearch .dropdown-toggle");
            investmentButton.textContent = "Wybierz z listy";
            document.querySelectorAll("input[name='apartments-invest']").forEach(input => input.checked = false);
            document.querySelectorAll("#investmentSearch .dropdown-item").forEach(item => item.classList.remove("active"));
        }

        function setupDropdown(dropdownId, inputName, onSelectCallback) {
            let dropdown = document.querySelector(dropdownId);
            let button = dropdown.querySelector(".dropdown-toggle");
            let items = dropdown.querySelectorAll(".dropdown-item");

            items.forEach(item => {
                item.addEventListener("click", function () {
                    let listItem = this.closest("li");
                    let radioInput = listItem.querySelector(`input[name='${inputName}']`);

                    if (radioInput) {
                        radioInput.checked = true;
                    }

                    items.forEach(el => el.classList.remove("active"));
                    this.classList.add("active");
                    button.textContent = this.textContent;
                    dropdown.querySelector(".dropdown-menu").classList.remove("show");

                    if (onSelectCallback) {
                        onSelectCallback(radioInput ? radioInput.value : "");
                    }
                });
            });

            button.addEventListener("click", function (e) {
                e.stopPropagation();
                let menu = this.nextElementSibling;
                document.querySelectorAll(".dropdown-menu.show").forEach(m => {
                    if (m !== menu) {
                        m.classList.remove("show");
                    }
                });
                menu.classList.toggle("show");
            });
            document.addEventListener("click", function (e) {
                if (!e.target.closest(dropdownId)) {
                    dropdown.querySelector(".dropdown-menu").classList.remove("show");
                }
            });
        }

        setupDropdown("#citySearch", "apartments-city", updateInvestments);
        setupDropdown("#investmentSearch", "apartments-invest", null);
    });
</script>
