
      <!-- navbar-->
      <header class="header bg-white">
        <div class="container px-lg-3">
          <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="/"><span class="fw-bold text-uppercase text-dark">Shop</span></a>
            <button class="navbar-toggler navbar-toggler-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto">
                <li class="nav-item">
                  <!-- Link--><a class="nav-link active" href="/">Home</a>
                </li>
              </ul>
              <ul class="navbar-nav ms-auto">               
                <li class="nav-item"><a class="nav-link" href="/carts"> <i class="fas fa-dolly-flatbed me-1 text-gray"></i>
                  Cart<small class="text-gray fw-normal">(<?= cartTotal() ? cartTotal() : 0; ?>)</small></a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </header>