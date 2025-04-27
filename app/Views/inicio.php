<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('titulo') ?>
ZonaHW - Venta de Hardware
<?= $this->endSection() ?>

<?= $this->section('styles') ?>
  <link rel="stylesheet" href="<?= base_url('public/assets/css/inicio/index.css') ?>">
<?= $this->endSection() ?>


<?= $this->section('contenido') ?>

<style>
.carrousel-control-prev-icon, 
.carrousel-control-next-icon {
  background-color: red;
}

div.container-fluid {
    padding-left: 0 ;
    padding-right: 0 ;
}
</style>

<div class="container-fluid">
  <div id="c-1" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="1000">
        <img src="assets/img/slide4.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item" data-bs-interval="500">
        <img src="assets/img/slide2.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="assets/img/slide3.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#c-1" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#c-1" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>



<section class="py-5 carrousel-cards">



  <!-- Carrousel con cards -->

<div id="carouselDestacados" class="carousel slide" data-bs-ride="carousel">

<h2 class="fw-bold mb-4">Productos Destacados</h2>

  <div class="carousel-inner">
  

    <!-- Slide 1 -->
    <div class="carousel-item active">
      <div class="container">
        <div class="row">
        <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="assets/img/placa-madre.jpeg" class="card-img-top" alt="Producto 1">
          <div class="card-body">
            <h5 class="card-title">Procesador AMD Ryzen</h5>
            <p class="card-text">Alto rendimiento para gaming y productividad.</p>
            <p class="card-text fw-bold">$89.990</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="assets/img/placa-madre.jpeg" class="card-img-top" alt="Producto 1">
          <div class="card-body">
            <h5 class="card-title">Procesador AMD Ryzen</h5>
            <p class="card-text">Alto rendimiento para gaming y productividad.</p>
            <p class="card-text fw-bold">$89.990</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="assets/img/placa-madre.jpeg" class="card-img-top" alt="Producto 1">
          <div class="card-body">
            <h5 class="card-title">Procesador AMD Ryzen</h5>
            <p class="card-text">Alto rendimiento para gaming y productividad.</p>
            <p class="card-text fw-bold">$89.990</p>
          </div>
        </div>
      </div>
        </div>
      </div>
    </div>

    <!--slide 2 -->
    <div class="carousel-item">
      <div class="container">
        <div class="row">
        <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="assets/img/memoria8gb.jpeg" class="card-img-top" alt="Producto 1">
          <div class="card-body">
            <h5 class="card-title">Procesador AMD Ryzen</h5>
            <p class="card-text">Alto rendimiento para gaming y productividad.</p>
            <p class="card-text fw-bold">$89.990</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="assets/img/memoria8gb.jpeg" class="card-img-top" alt="Producto 1">
          <div class="card-body">
            <h5 class="card-title">Procesador AMD Ryzen</h5>
            <p class="card-text">Alto rendimiento para gaming y productividad.</p>
            <p class="card-text fw-bold">$89.990</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="assets/img/memoria8gb.jpeg" class="card-img-top" alt="Producto 1">
          <div class="card-body">
            <h5 class="card-title">Procesador AMD Ryzen</h5>
            <p class="card-text">Alto rendimiento para gaming y productividad.</p>
            <p class="card-text fw-bold">$89.990</p>
          </div>
        </div>
      </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Controles -->
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselDestacados" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselDestacados" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
</section>

<hr>
<section class="py-5 carrousel-cards">



  <!-- Carrousel con cards -->

  <div id="carouselOfertas" class="carousel slide" data-bs-ride="carousel">
  <h2 class="fw-bold mb-4">Ofertas Especiales!</h2>
  
  <div class="carousel-inner">

    <!-- Slide 1 -->
    <div class="carousel-item active">
      <div class="container">
        <div class="row">
        <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="assets/img/placa-madre.jpeg" class="card-img-top" alt="Producto 1">
          <div class="card-body">
            <h5 class="card-title">Procesador AMD Ryzen</h5>
            <p class="card-text">Alto rendimiento para gaming y productividad.</p>
            <p class="card-text fw-bold">$89.990</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="assets/img/placa-madre.jpeg" class="card-img-top" alt="Producto 1">
          <div class="card-body">
            <h5 class="card-title">Procesador AMD Ryzen</h5>
            <p class="card-text">Alto rendimiento para gaming y productividad.</p>
            <p class="card-text fw-bold">$89.990</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="assets/img/placa-madre.jpeg" class="card-img-top" alt="Producto 1">
          <div class="card-body">
            <h5 class="card-title">Procesador AMD Ryzen</h5>
            <p class="card-text">Alto rendimiento para gaming y productividad.</p>
            <p class="card-text fw-bold">$89.990</p>
          </div>
        </div>
      </div>
        </div>
      </div>
    </div>

    <!--slide 2 -->
    <div class="carousel-item">
      <div class="container">
        <div class="row">
        <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="assets/img/memoria8gb.jpeg" class="card-img-top" alt="Producto 1">
          <div class="card-body">
            <h5 class="card-title">Procesador AMD Ryzen</h5>
            <p class="card-text">Alto rendimiento para gaming y productividad.</p>
            <p class="card-text fw-bold">$89.990</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="assets/img/memoria8gb.jpeg" class="card-img-top" alt="Producto 1">
          <div class="card-body">
            <h5 class="card-title">Procesador AMD Ryzen</h5>
            <p class="card-text">Alto rendimiento para gaming y productividad.</p>
            <p class="card-text fw-bold">$89.990</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="assets/img/memoria8gb.jpeg" class="card-img-top" alt="Producto 1">
          <div class="card-body">
            <h5 class="card-title">Procesador AMD Ryzen</h5>
            <p class="card-text">Alto rendimiento para gaming y productividad.</p>
            <p class="card-text fw-bold">$89.990</p>
          </div>
        </div>
      </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Controles -->
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselOfertas" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselOfertas" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
</section>

<hr>

<div class="container mt-5">
  <h2 class="fw-bold mb-4">Nuevas Categorías</h2>

  <div id="categoriasCarousel" class="carousel slide" data-bs-ride="carousel">
    <!-- Indicadores -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#categoriasCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#categoriasCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <!-- Agregá más botones si tenés más slides -->
    </div>

    <!-- Slides -->
    <div class="carousel-inner">

      <div class="carousel-item active">
        <div class="row">
          <div class="col-md-3">
            <div class="card">
              <img src="assets/img/teclado-mecanico.webp" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Producto A</h5>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card">
              <img src="assets/img/teclado-mecanico.webp" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Producto B</h5>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card">
              <img src="assets/img/teclado-mecanico.webp" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Producto C</h5>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card">
              <img src="assets/img/teclado-mecanico.webp" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Producto D</h5>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="carousel-item">
        <div class="row">
          <div class="col-md-3">
            <div class="card">
              <img src="assets/img/teclado-mecanico.webp" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Producto E</h5>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card">
              <img src="assets/img/teclado-mecanico.webp" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Producto F</h5>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card">
              <img src="assets/img/teclado-mecanico.webp" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Producto G</h5>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card">
              <img src="assets/img/teclado-mecanico.webp" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Producto H</h5>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>


<?= $this->endSection() ?>