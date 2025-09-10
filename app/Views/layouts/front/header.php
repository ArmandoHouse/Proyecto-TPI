<?php
    // Sumar la cantidad total de productos en el carrito
    $cantidadCarrito = 0;
    $carrito = session()->get('carrito');
    if (is_array($carrito)) {
        foreach ($carrito as $item) {
            $cantidadCarrito += isset($item['cantidad']) ? (int)$item['cantidad'] : 1;
        }
    }
?>
<style>
.cart-badge {
    position: absolute;
    top: -6px;
    right: -10px;
    background: #dc3545;
    color: #fff;
    font-size: 13px;
    font-weight: bold;
    border-radius: 50%;
    padding: 2px 7px;
    min-width: 22px;
    text-align: center;
    z-index: 2;
    box-shadow: 0 1px 4px rgba(0,0,0,0.15);
}
</style>
<header class="site-header sticky-top">
    <div class="border-bottom bg-white">
      <div class="container-lg center-container d-flex align-items-center gap-3 py-2">
        <button class="btn btn-ghost burger-btn p-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu" aria-label="Abrir menú">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <line x1="3" y1="12" x2="21" y2="12" />
            <line x1="3" y1="6" x2="21" y2="6" />
            <line x1="3" y1="18" x2="21" y2="18" />
          </svg>
        </button>

        <!-- Logo -->
        <a href="/" class="d-flex align-items-center text-decoration-none logo me-2">
          <img src="https://cdn.builder.io/api/v1/image/assets%2F17444f86998a4d339dfaa11a87c8b62d%2Fe2be8ad318cb46aba65de4ec5b5ae91c?format=webp&width=800" alt="zonahw" class="site-logo" style="height:32px;" />
        </a>

        <!-- Search -->
        <form class="flex-grow-1 d-none d-sm-block" role="search">
          <div class="position-relative">
            <input type="search" class="form-control form-control-sm search-input" placeholder="Buscar Productos o Marcas" aria-label="Buscar" />
            <button class="btn search-btn" aria-label="Buscar" type="submit">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="7" />
                <line x1="21" y1="21" x2="16.65" y2="16.65" />
              </svg>
            </button>
          </div>
        </form>

        <!-- Icons -->
        <nav class="ms-auto d-flex align-items-center gap-3">
          <a href="<?= base_url('login')?>" class="d-inline-flex align-items-center text-decoration-none text-muted small">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round" class="me-1">
              <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
              <circle cx="12" cy="7" r="4" />
            </svg>
            <span class="d-none d-lg-inline">Mi cuenta</span>
          </a>
          <a href="<?= base_url('carrito')?>" class="position-relative text-decoration-none text-muted">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round">
              <path d="M6 6h15l-1.5 9h-13z" />
              <circle cx="9" cy="20" r="1" />
              <circle cx="18" cy="20" r="1" />
            </svg>
            <?php if ($cantidadCarrito > 0): ?>
                <span class="cart-badge"><?= $cantidadCarrito ?></span>
            <?php endif; ?>
          </a>
        </nav>
      </div>
    </div>

    <!-- Desktop nav -->
    <div class="d-none d-md-block bg-brand-dark text-white primary-nav">
      <div class="container-lg d-flex flex-column">
        <div class="d-flex">
          <ul class="nav mx-auto d-flex flex-nowrap" style="white-space:nowrap;">
            <li class="nav-item"><a class="nav-link text-white px-2" href="<?= base_url('/')?>">Principal</a></li>
            <li class="nav-item"><a class="nav-link text-white px-2" href="<?= base_url('catalogo/ver_catalogo')?>">Catálogo de Productos</a></li>
            <li class="nav-item"><a class="nav-link text-white px-2" href="<?= base_url('quienes_somos')?>">Quienes Somos</a></li>
            <li class="nav-item"><a class="nav-link text-white px-2" href="<?= base_url('comercializacion')?>">Comercialización</a></li>
            <li class="nav-item"><a class="nav-link text-white px-2" href="<?= base_url('contacto')?>">Información de Contacto</a></li>
            <li class="nav-item"><a class="nav-link text-white px-2" href="<?= base_url('terminos')?>">Términos y Usos</a></li>
          </ul>
        </div>  
      </div>
    </div>

    <!-- Mobile menu -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
      <div class="offcanvas-header bg-brand-dark text-white">
        <h5 class="offcanvas-title" id="mobileMenuLabel">Menú</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="list-unstyled">
          <li><a href="<?= base_url('/')?>" class="d-block py-2">Principal</a></li>
          <li><a href="<?= base_url('catalogo/ver_catalogo')?>" class="d-block py-2">Catálogo de Productos</a></li>
          <li><a href="<?= base_url('quienes_somos')?>" class="d-block py-2">Quienes Somos</a></li>
          <li><a href="<?= base_url('comercializacion')?>" class="d-block py-2">Comercialización</a></li>
          <li><a href="<?= base_url('contacto')?>" class="d-block py-2">Información de Contacto</a></li>
          <li><a href="<?= base_url('terminos')?>" class="d-block py-2">Términos y Usos</a></li>
          <li class="mt-3"><a href="#ingresar" class="d-block py-2">Ingresar</a></li>
          <li><a href="#compras" class="d-block py-2">Mis compras</a></li>
          <li class="mt-3"><a href="#soporte" class="d-block py-2">Soporte técnico</a></li>
          <li><a href="#envios" class="d-block py-2">Envíos y entregas</a></li>
          <li><a href="#contacto2" class="d-block py-2">Contacto</a></li>
        </ul>
      </div>
    </div>
  </header>
