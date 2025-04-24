<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('titulo') ?>
El Taller - Venta de Hardware
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/img/ryzen7.jpg" class="d-block w-100" alt="slide 1">
    </div>
    <div class="carousel-item">
      <img src="assets/img/keyboard.jpg" class="d-block w-100" alt="slide 2">
    </div>
    <div class="carousel-item">
      <img src="assets/img/gaming-setup.jpg" class="d-block w-100" alt="slide 3">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<section class="py-5 .inicio">
  <div class="container">
    <h2 class="text-center mb-4">Productos Destacados</h2>
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="assets/img/admryzen.jpeg" class="card-img-top" alt="Producto 1">
          <div class="card-body">
            <h5 class="card-title">Procesador AMD Ryzen</h5>
            <p class="card-text">Alto rendimiento para gaming y productividad.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="assets/img/kingston480.jpeg" class="card-img-top" alt="Producto 2">
          <div class="card-body">
            <h5 class="card-title">SSD Kingston 480GB</h5>
            <p class="card-text">Velocidad y confiabilidad para tu equipo.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="assets/img/ram16gb.jpg" class="card-img-top" alt="Producto 3">
          <div class="card-body">
            <h5 class="card-title">Memoria RAM 16GB DDR4</h5>
            <p class="card-text">Ideal para multitarea y cargas intensas.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
