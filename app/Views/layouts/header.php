<style>
    /* Estilos adicionales */
    .btn-circle {
      border-radius: 50%;
      width: 40px;
      height: 40px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
    }
    .logo-text {
      font-size: 1.5rem;
    }
  </style>
<div class="sticky-top">
  <!-- Top Bar: Sección Superior con la clase "fondo" -->
  <div class="fondo text-white">
    <div class="container py-3">
      <div class="row align-items-center justify-content-between gx-2">
        
        <!-- Logo y botón toggler (visible solo en móviles) -->
        <div class="col-6 col-md-2 d-flex align-items-center">
          <button class="navbar-toggler d-block d-lg-none me-2" type="button" 
                  data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" 
                  aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span>
          </button>
          <i class="bi fs-1 bi-cpu-fill me-2"></i>
          <span class="logo-text fw-bold">ZH</span>
        </div>
        
        <!-- Barra de búsqueda (sólo visible en escritorio) -->
        <div class="col-12 col-md-6 d-none d-lg-block">
          <div class="search-bar">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Buscar..." aria-label="Buscar" aria-describedby="search-addon">
              <button type="button" class="btn" id="search-addon">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
        
        <!-- Íconos (Se muestra solo un botón para el carrito y otro para usuario) -->
        <div class="col-6 col-md-2 d-flex justify-content-end align-items-center gap-2">
          <button type="button" class="btn btn-circle me-2">
            <i class="fa-solid fa-cart-shopping"></i>
          </button>
          <button type="button" class="btn btn-circle">
            <i class="fa-solid fa-user"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Menú de Navegación: Fondo azul -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <!-- El collapse se activa mediante el botón toggler definido en la Top Bar -->
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