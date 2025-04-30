<div class="sticky-top">
  <div class="fondo">
    <div class="container py-3">
      <div class="row align-items-center justify-content-between gx-2">
        <div class="col-6 col-md-2 logo fw-bold d-flex align-items-center">
          <i class="bi fs-1 bi-cpu-fill me-2"></i>
          <span class="logo-text">ZH</span>
        </div>

        <div class="col-12 col-md-6 my-2 my-md-0">
          <div class="search-bar">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Buscar..." aria-label="Buscar" aria-describedby="search-addon">
              <button type="button" class="btn" id="search-addon">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>

        <div class="col-6 col-md-2 d-flex justify-content-end">
          <button type="button" class="btn btn-circle me-2"><i class="icon fa-solid fa-cart-shopping"></i></button>
          <button type="button" class="btn btn-circle"><i class="icon fa-solid fa-user"></i></button>
        </div>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item mx-2">
            <a class="nav-link" href="<?= base_url('public/') ?>">Principal</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link" href="<?= base_url('public/quienes_somos') ?>">Quienes Somos</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link" href="<?= base_url('public/comercializacion') ?>">Comercialización</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link" href="<?= base_url('public/contacto') ?>">Información de Contacto</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link" href="<?= base_url('public/terminos') ?>">Términos y Usos</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

</div>