<!-- resources/views/components/apartment-list.blade.php -->

<section class="margin-xs">
  <div class="container">
      <!-- BUTTONS -->
      <div class="row">
          <div class="col d-flex justify-content-end">
              <ul class="nav nav-pills mb-3" id="layout-switch" data-aos="fade" data-aos-delay="200">
                  <!-- ROW Button -->
                  <li role="presentation">
                      <button class="grid-btn" id="row-view" type="button">
                          <!-- Wstaw SVG dla przycisku "Row" tutaj -->

                          ROW
                      </button>
                  </li>
                  <!-- COLUMN Button -->
                  <li role="presentation">
                      <button class="grid-btn active" id="column-view" type="button">
                          <!-- Wstaw SVG dla przycisku "Column" tutaj -->

                          COLUMN
                      </button>
                  </li>
              </ul>
          </div>
      </div>

      <!-- ROW HEADERS -->
      <div class="row gx-3 mt-5 d-none d-xl-flex" data-aos="fade">
          <div class="d-flex main-row-titles">
              <div class="ap-column-title">Status</div>
              <div class="ap-column-title ap-apartment">MIESZKANIE</div>
              <div class="d-flex inner-row-titles">
                  <div class="ap-column-title ap-squares">POWIERZCHNIA</div>
                  <div class="ap-column-title ap-balcony">BALKON/OGRÓD</div>
                  <div class="ap-column-title ap-level">PIĘTRO</div>
                  <div class="ap-column-title ap-rooms">POKOJE</div>
              </div>
              <div class="ap-column-title ap-rzut">RZUT</div>
          </div>
      </div>

      <!-- APARTMENT BOXES -->
      <div class="row apartment-box-container switch">
          {{ $slot }}
      </div>

      <!-- PAGINATION -->
      <div class="row mt-5">
          <div class="col-12 d-flex justify-content-center">
              <nav aria-label="Page navigation">
                  <ul class="pagination">
                      <li class="page-item">
                          <a class="page-link" href="#" aria-label="Previous">
                              <!-- Wstaw SVG dla przycisku "Previous" tutaj -->
                          </a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                          <a class="page-link" href="#" aria-label="Next">
                              <!-- Wstaw SVG dla przycisku "Next" tutaj -->
                          </a>
                      </li>
                  </ul>
              </nav>
          </div>
      </div>
  </div>
</section>

<script>
  document.addEventListener("DOMContentLoaded", function () {
      const rowButton = document.getElementById("row-view");
      const columnButton = document.getElementById("column-view");
      const apartmentContainer = document.querySelector(".apartment-box-container");

      rowButton.addEventListener("click", () => {
          apartmentContainer.classList.remove("ap-column-switch");
      });

      columnButton.addEventListener("click", () => {
          apartmentContainer.classList.add("ap-column-switch");
      });
  });
</script>
