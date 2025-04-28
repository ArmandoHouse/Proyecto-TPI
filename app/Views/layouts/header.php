<div class="fondo">
  <div class="container p-3">
    <div class="row justify-content-between">
      <div class="col-2 fw-bold align-self-center">
        Logo
      </div>
      <div class="col-6">
        <div class="search-bar">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search..." aria-label="Search" aria-describedby="search-addon">

            <button type="button" class="btn" id="search-addon">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </div>
      <div class="col-2 align-self-center">
        <button type="button" class="btn btn-circle"><i class="icon fa-solid fa-cart-shopping"></i></button>
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

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item mx-4">
          <a class="nav-link" href="<?= base_url('public/') ?>">Principal</a>
        </li>
        <li class="nav-item mx-4">
          <a class="nav-link" href="<?= base_url('public/quienes_somos') ?>">Quienes Somos</a>
        </li>
        <li class="nav-item mx-4">
          <a class="nav-link" href="<?= base_url('public/comercializacion') ?>">Comercialización</a>
        </li>
        <li class="nav-item mx-4">
          <a class="nav-link" href="<?= base_url('public/contacto') ?>">Información de Contacto</a>
        </li>
        <li class="nav-item mx-4">
          <a class="nav-link" href="<?= base_url('public/terminos') ?>">Términos y Usos</a>
        </li>
      </ul>
    </div>
  </div>
</nav>