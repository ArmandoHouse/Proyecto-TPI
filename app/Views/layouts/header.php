<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">El Taller</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <!-- Enlaces principales -->
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/public') ?>">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/public/productos') ?>">Comercializacion</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/public/envios-y-pagos') ?>">Envios y Pagos</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/public/nosotros') ?>">Quienes Somos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/public/contacto') ?>">Contacto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/public/terminos') ?>">Terminos</a>
        </li>        
      </ul>

      <!-- Barra de búsqueda -->
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Buscar">
        <button class="btn btn-outline-light" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>
