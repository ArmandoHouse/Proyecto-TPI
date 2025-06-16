<?php $session = session(); ?>

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


<style>
  /* Asegurar que el navbar tenga el z-index correcto */
  .navbar {
    position: relative;
    z-index: 1030;
  }

  .sticky-top {
    position: relative;
    /* para que z-index funcione */
    z-index: 1020;
    /* z-index alto pero menor que dropdown */
  }

  .dropdown-menu {
    z-index: 1050 !important;
    /* bootstrap usa 1050 para dropdown */
  }

  /* Solo estilos para el mega dropdown - SOLO cuando esté activo */
  .mega-dropdown {
    position: absolute !important;
    top: 100% !important;
    left: 50% !important;
    transform: translateX(-50%) !important;
    width: 800px;
    max-width: calc(100vw - 40px);
    background: white !important;
    border: 1px solid rgba(0, 0, 0, 0.15) !important;
    border-radius: 8px !important;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2) !important;
    padding: 0 !important;
    margin-top: 0 !important;
    z-index: 1050 !important;
  }

  /* Ajuste para pantallas más pequeñas - evitar que se corte */
  @media (max-width: 900px) {
    .mega-dropdown {
      left: 20px !important;
      right: 20px !important;
      transform: none !important;
      width: auto !important;
      max-width: none !important;
    }
  }

  /* Para pantallas muy grandes, centrar respecto al contenedor */
  @media (min-width: 1200px) {
    .mega-dropdown {
      left: 70% !important;
      margin-left: -400px !important;
      transform: none !important;
    }
  }

  /* Mejorar los items del dropdown */
  .mega-dropdown .dropdown-item {
    padding: 10px 15px !important;
    font-size: 14px;
    color: #212529 !important;
    transition: all 0.2s ease;
    white-space: nowrap;
    border-radius: 4px;
    margin: 2px 8px;
    background: transparent !important;
  }

  .mega-dropdown .dropdown-item:hover {
    background-color: #f8f9fa !important;
    color: #0d6efd !important;
  }

  /* Ajustar el contenedor del dropdown */
  .mega-dropdown .row {
    margin: 0 !important;
    padding: 20px 0;
  }

  .mega-dropdown .col-12.col-md-3 {
    padding: 0 20px;
    border-right: 1px solid rgba(0, 0, 0, 0.1);
  }

  .mega-dropdown .col-12.col-md-3:last-child {
    border-right: none;
  }

  /* Responsive para el mega dropdown */
  @media (max-width: 768px) {
    .mega-dropdown {
      position: static !important;
      width: 100% !important;
      transform: none !important;
      left: 0 !important;
      right: auto !important;
      margin-left: 0 !important;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1) !important;
      border-radius: 0 !important;
      margin-top: 0 !important;
      max-width: none !important;
    }

    .mega-dropdown .col-12.col-md-3 {
      border-right: none;
      border-bottom: 1px solid rgba(0, 0, 0, 0.08);
      padding: 15px 20px;
    }

    .mega-dropdown .col-12.col-md-3:last-child {
      border-bottom: none;
    }
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
          <a href="<?= base_url('public/carrito') ?>">
            <button type="button" class="btn btn-circle me-2">
              <i class="fa-solid fa-cart-shopping" style="width: 30px;"></i>
            </button>
          </a>
          <?php if ($session->get('logueado')): ?>
            <div class="dropdown">
              <a href="#" class="text-white text-decoration-none dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown">
                <span class="d-none d-md-inline"><?= esc($session->get('nom_usuario')) ?></span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="<?= base_url('perfil') ?>">Mi perfil</a></li>
                <li><a class="dropdown-item" href="<?= base_url('public/logout') ?>">Cerrar sesión</a></li>
              </ul>
            </div>
          <?php else: ?>
            <a href="<?= base_url('public/login') ?>">
              <button type="button" class="btn btn-circle">
                <i class="fa-solid fa-user"></i>
              </button>
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <?php

  use App\Models\CategoriasModel;

  $categoriaModel = new CategoriasModel();
  $categorias = $categoriaModel->findAll();
  ?>

  <!-- Menú de Navegación: Fondo azul -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item mx-2">
            <a class="nav-link" href="<?= base_url('public/') ?>">Principal</a>
          </li>
          <li class="nav-item dropdown mx-2">
            <a class="nav-link dropdown-toggle" href="#" id="megaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Catálogo de Productos
            </a>

            <div class="dropdown-menu mega-dropdown" aria-labelledby="megaDropdown">
              <div class="row gx-4 gy-2 px-4 py-3">
                <?php if (!empty($categorias)) : ?>
                  <?php
                  $maxFilasPorColumna = 4;
                  $chunks = array_chunk($categorias, $maxFilasPorColumna);
                  ?>
                  <?php foreach ($chunks as $columna) : ?>
                    <div class="col-12 col-md-3">
                      <?php foreach ($columna as $categoria) : ?>
                        <a class="dropdown-item" href="<?= base_url('public/catalogo/ver_catalogo/' . $categoria['id']) ?>">
                          <?= esc($categoria['nombre']) ?>
                        </a>
                      <?php endforeach; ?>
                    </div>
                  <?php endforeach; ?>
                <?php else : ?>
                  <div class="col-12">
                    <span class="dropdown-item text-muted">No hay categorías</span>
                  </div>
                <?php endif; ?>
              </div>
            </div>

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