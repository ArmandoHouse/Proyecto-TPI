<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>El Taller - Venta de Hardware</title>
  <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
  <style>
    .carousel-item img {
      height: 450px;
      object-fit: cover;
    }
    .footer-icon {
      font-size: 1.2rem;
      margin-right: 10px;
    }

    section img {
        width: 400px;
        height: 280px;
    }
  </style>
</head>
<body>

<!-- HEADER -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">El Taller</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <!-- Enlaces principales -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="#">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Servicios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contacto</a>
        </li>

        <!-- Menú desplegable -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
            Categorías
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Procesadores</a></li>
            <li><a class="dropdown-item" href="#">Discos SSD</a></li>
            <li><a class="dropdown-item" href="#">Memorias RAM</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Accesorios</a></li>
          </ul>
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


<!-- CAROUSEL -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets\img\ryzen7.jpg" class="d-block w-100" alt="slide 1">
    </div>
    <div class="carousel-item">
      <img src="assets\img\keyboard.jpg" class="d-block w-100" alt="slide 2">
    </div>
    <div class="carousel-item">
      <img src="assets\img\gaming-setup.jpg" class="d-block w-100" alt="slide 3">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<!-- PRODUCTOS DESTACADOS -->
<section class="py-5">
  <div class="container">
    <h2 class="text-center mb-4">Productos Destacados</h2>
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="assets\img\admryzen.jpeg" class="card-img-top" alt="Producto 1">
          <div class="card-body">
            <h5 class="card-title">Procesador AMD Ryzen</h5>
            <p class="card-text">Alto rendimiento para gaming y productividad.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="assets\img\kingston480.jpeg" class="card-img-top" alt="Producto 2">
          <div class="card-body">
            <h5 class="card-title">SSD Kingston 480GB</h5>
            <p class="card-text">Velocidad y confiabilidad para tu equipo.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="assets\img\ram16gb.jpg" class="card-img-top" alt="Producto 3">
          <div class="card-body">
            <h5 class="card-title">Memoria RAM 16GB DDR4</h5>
            <p class="card-text">Ideal para multitarea y cargas intensas.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FOOTER COMPLETO -->
<footer class="bg-dark text-white pt-4">
  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-3">
        <h5>Contacto</h5>
        <p><i class="bi bi-telephone-fill footer-icon"></i> +54 9 351 1234567</p>
        <p><i class="bi bi-envelope-fill footer-icon"></i> contacto@eltaller.com</p>
        <p><i class="bi bi-geo-alt-fill footer-icon"></i> Av. Siempre Viva 123, Córdoba</p>
      </div>
      <div class="col-md-4 mb-3">
        <h5>Redes Sociales</h5>
        <a href="#" class="text-white d-block"><i class="bi bi-facebook footer-icon"></i>Facebook</a>
        <a href="#" class="text-white d-block"><i class="bi bi-instagram footer-icon"></i>Instagram</a>
        <a href="#" class="text-white d-block"><i class="bi bi-whatsapp footer-icon"></i>WhatsApp</a>
      </div>
      <div class="col-md-4 mb-3">
        <h5>Horario de Atención</h5>
        <p>Lunes a Viernes: 9:00 a 18:00 hs</p>
        <p>Sábados: 9:00 a 13:00 hs</p>
      </div>
    </div>
    <div class="text-center border-top pt-3">
      &copy; <?= date('Y') ?> El Taller. Todos los derechos reservados.
    </div>
  </div>
</footer>

<!-- BOOTSTRAP JS -->
<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
<!-- Bootstrap Icons (si los usás) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>
