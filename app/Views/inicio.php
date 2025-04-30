<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('titulo') ?>
ZonaHW - Venta de Hardware
<?= $this->endSection() ?>

<?= $this->section('styles') ?>
  <link rel="stylesheet" href="<?= base_url('public/assets/css/inicio/index.css') ?>">
<?= $this->endSection() ?>


<?= $this->section('contenido') ?>



<div class="container-fluid p-0">
  <div id="c-1" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="3000">
        <img src="assets/img/slide1.jpg" class="d-block w-100 img-fluid" alt="Slide 1">
      </div>
      <div class="carousel-item" data-bs-interval="3000">
        <img src="assets/img/slide2.jpg" class="d-block w-100 img-fluid" alt="Slide 2">
      </div>
      <div class="carousel-item">
        <img src="assets/img/slide3.jpg" class="d-block w-100 img-fluid" alt="Slide 3">
      </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#c-1" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#c-1" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Siguiente</span>
    </button>
  </div>
</div>

<!-- SECCION CATEGORIAS -->

<section class="py-5">
  <div class="container text-center">

    <h2 class="mb-2">Explorá nuestras <span class="fw-bold">categorías</span></h2>
    <hr class="mx-auto border-primary opacity-75" style="width: 780px; height: 3px;">

    <div class="row justify-content-center g-4">

      <!-- Card -->
      <div class="col-6 col-sm-4 col-md-2-4">
        <div class="card categoria-card border-0 overflow-hidden rounded-4 mx-auto shadow-sm" style="width: 180px; height: 130px; transition: all 0.3s ease;">
          <div class="position-relative h-100">
            <img src="assets/img/categorias/procesadores.jpg" class="card-img-top object-fit-cover h-100" alt="Procesadores" style="object-position: center;">
            <div class="card-img-overlay d-flex align-items-end p-0">
              <div class="w-100 text-center bg-dark bg-opacity-50 py-1">
                <h6 class="card-title text-white mb-0 small">Procesadores</h6>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-6 col-sm-4 col-md-2-4">
        <div class="card categoria-card border-0 overflow-hidden rounded-4 mx-auto shadow-sm" style="width: 180px; height: 130px; transition: all 0.3s ease;">
          <div class="position-relative h-100">
            <img src="assets/img/categorias/ram.jpg" class="card-img-top object-fit-cover h-100" alt="Procesadores" style="object-position: center;">
            <div class="card-img-overlay d-flex align-items-end p-0">
              <div class="w-100 text-center bg-dark bg-opacity-50 py-1">
                <h6 class="card-title text-white mb-0 small">Memoria RAM</h6>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-6 col-sm-4 col-md-2-4">
        <div class="card categoria-card border-0 overflow-hidden rounded-4 mx-auto shadow-sm" style="width: 180px; height: 130px; transition: all 0.3s ease;">
          <div class="position-relative h-100">
            <img src="assets/img/categorias/placa-madre.jpg" class="card-img-top object-fit-cover h-100" alt="Procesadores" style="object-position: center;">
            <div class="card-img-overlay d-flex align-items-end p-0">
              <div class="w-100 text-center bg-dark bg-opacity-50 py-1">
                <h6 class="card-title text-white mb-0 small">Placa Madre</h6>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-6 col-sm-4 col-md-2-4">
        <div class="card categoria-card border-0 overflow-hidden rounded-4 mx-auto shadow-sm" style="width: 180px; height: 130px; transition: all 0.3s ease;">
          <div class="position-relative h-100">
            <img src="assets/img/categorias/gabinetes.jpg" class="card-img-top object-fit-cover h-100" alt="Procesadores" style="object-position: center;">
            <div class="card-img-overlay d-flex align-items-end p-0">
              <div class="w-100 text-center bg-dark bg-opacity-50 py-1">
                <h6 class="card-title text-white mb-0 small">Gabinetes</h6>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-6 col-sm-4 col-md-2-4">
        <div class="card categoria-card border-0 overflow-hidden rounded-4 mx-auto shadow-sm" style="width: 180px; height: 130px; transition: all 0.3s ease;">
          <div class="position-relative h-100">
            <img src="assets/img/categorias/placa-video.jpg" class="card-img-top object-fit-cover h-100" alt="Procesadores" style="object-position: center;">
            <div class="card-img-overlay d-flex align-items-end p-0">
              <div class="w-100 text-center bg-dark bg-opacity-50 py-1">
                <h6 class="card-title text-white mb-0 small">Placas de Video</h6>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-6 col-sm-4 col-md-2-4">
        <div class="card categoria-card border-0 overflow-hidden rounded-4 mx-auto shadow-sm" style="width: 180px; height: 130px; transition: all 0.3s ease;">
          <div class="position-relative h-100">
            <img src="assets/img/categorias/perifericos.jpg" class="card-img-top object-fit-cover h-100" alt="Procesadores" style="object-position: center;">
            <div class="card-img-overlay d-flex align-items-end p-0">
              <div class="w-100 text-center bg-dark bg-opacity-50 py-1">
                <h6 class="card-title text-white mb-0 small">Perifericos</h6>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-6 col-sm-4 col-md-2-4">
        <div class="card categoria-card border-0 overflow-hidden rounded-4 mx-auto shadow-sm" style="width: 180px; height: 130px; transition: all 0.3s ease;">
          <div class="position-relative h-100">
            <img src="assets/img/categorias/almacenamiento.jpg" class="card-img-top object-fit-cover h-100" alt="Procesadores" style="object-position: center;">
            <div class="card-img-overlay d-flex align-items-end p-0">
              <div class="w-100 text-center bg-dark bg-opacity-50 py-1">
                <h6 class="card-title text-white mb-0 small">Almacenamiento</h6>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-6 col-sm-4 col-md-2-4">
        <div class="card categoria-card border-0 overflow-hidden rounded-4 mx-auto shadow-sm" style="width: 180px; height: 130px; transition: all 0.3s ease;">
          <div class="position-relative h-100">
            <img src="assets/img/categorias/monitores.jpg" class="card-img-top object-fit-cover h-100" alt="Procesadores" style="object-position: center;">
            <div class="card-img-overlay d-flex align-items-end p-0">
              <div class="w-100 text-center bg-dark bg-opacity-50 py-1">
                <h6 class="card-title text-white mb-0 small">Monitores</h6>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-6 col-sm-4 col-md-2-4">
        <div class="card categoria-card border-0 overflow-hidden rounded-4 mx-auto shadow-sm" style="width: 180px; height: 130px; transition: all 0.3s ease;">
          <div class="position-relative h-100">
            <img src="assets/img/categorias/notebooks.jpg" class="card-img-top object-fit-cover h-100" alt="Procesadores" style="object-position: center;">
            <div class="card-img-overlay d-flex align-items-end p-0">
              <div class="w-100 text-center bg-dark bg-opacity-50 py-1">
                <h6 class="card-title text-white mb-0 small">Notebooks</h6>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
</section>


<!-- SECCIÓN DESTACADOS -->


<section class="py-5 carrousel-cards">
  <div class="container">
    <h2 class="mb-2 text-center">Conocé nuestros<span class="fw-bold">productos destacados</span></h2>
    <hr class="mx-auto border-primary opacity-75" style="width: 780px; height: 3px;">

    <!-- Contenedor de flechas + carrusel -->
    <div class="d-flex align-items-center justify-content-between mt-4">

      <!-- Flecha Izquierda -->
      <button class="btn btn-outline-primary mx-2" onclick="scrollDestacados(-1)">
        ‹
      </button>

      <!-- Carrusel -->
      <div id="destacadosContainer" class="d-flex carousel-slide carousel-fade overflow-auto gap-3 px-2 scroll-snap-x">
        
        <!-- Card 1 -->
        <div class="card mb-4 card-destacados">
          <img src="assets/img/placa-madre.jpeg" class="card-img-top" alt="Producto">
          <div class="card-body">
            <h5 class="card-title">Procesador AMD Ryzen</h5>
            <p class="card-text">Alto rendimiento para gaming y productividad.</p>
            <p class="fw-bold">$89.990</p>
            <a href="#" class="btn btn-primary">Ver más</a>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="card mb-4 card-destacados">
          <img src="assets/img/card.jpg" class="card-img-top" alt="Producto">
          <div class="card-body">
            <h5 class="card-title">Procesador AMD Ryzen</h5>
            <p class="card-text">Alto rendimiento para gaming y productividad.</p>
            <p class="fw-bold">$89.990</p>
            <a href="#" class="btn btn-primary">Ver más</a>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="card mb-4 card-destacados">
          <img src="assets/img/placa-madre.jpeg" class="card-img-top" alt="Producto">
          <div class="card-body">
            <h5 class="card-title">Procesador AMD Ryzen</h5>
            <p class="card-text">Alto rendimiento para gaming y productividad.</p>
            <p class="fw-bold">$89.990</p>
            <a href="#" class="btn btn-primary">Ver más</a>
          </div>
        </div>

        <!-- Card 4 -->
        <div class="card mb-4 card-destacados">
          <img src="assets/img/card.jpg" class="card-img-top" alt="Producto">
          <div class="card-body">
            <h5 class="card-title">Procesador AMD Ryzen</h5>
            <p class="card-text">Alto rendimiento para gaming y productividad.</p>
            <p class="fw-bold">$89.990</p>
            <a href="#" class="btn btn-primary">Ver más</a>
          </div>
        </div>

        <!-- Card 5 -->
        <div class="card mb-4 card-destacados">
          <img src="assets/img/placa-madre.jpeg" class="card-img-top" alt="Producto">
          <div class="card-body">
            <h5 class="card-title">Procesador AMD Ryzen</h5>
            <p class="card-text">Alto rendimiento para gaming y productividad.</p>
            <p class="fw-bold">$89.990</p>
            <a href="#" class="btn btn-primary">Ver más</a>
          </div>
        </div>

        <!-- Card 6 -->
        <div class="card mb-4 card-destacados">
          <img src="assets/img/card.jpg" class="card-img-top" alt="Producto">
          <div class="card-body">
            <h5 class="card-title">Procesador AMD Ryzen</h5>
            <p class="card-text">Alto rendimiento para gaming y productividad.</p>
            <p class="fw-bold">$89.990</p>
            <a href="#" class="btn btn-primary">Ver más</a>
          </div>
        </div>

        <!-- Card 7 -->
        <div class="card mb-4 card-destacados">
          <img src="assets/img/placa-madre.jpeg" class="card-img-top" alt="Producto">
          <div class="card-body">
            <h5 class="card-title">Procesador AMD Ryzen</h5>
            <p class="card-text">Alto rendimiento para gaming y productividad.</p>
            <p class="fw-bold">$89.990</p>
            <a href="#" class="btn btn-primary">Ver más</a>
          </div>
        </div>

        <!-- Card 8 -->
        <div class="card mb-4 card-destacados">
          <img src="assets/img/card.jpg" class="card-img-top" alt="Producto">
          <div class="card-body">
            <h5 class="card-title">Procesador AMD Ryzen</h5>
            <p class="card-text">Alto rendimiento para gaming y productividad.</p>
            <p class="fw-bold">$89.990</p>
            <a href="#" class="btn btn-primary">Ver más</a>
          </div>
        </div>

        <!-- Card 9 -->
        <div class="card mb-4 card-destacados">
          <img src="assets/img/card.jpg" class="card-img-top" alt="Producto">
          <div class="card-body">
            <h5 class="card-title">Procesador AMD Ryzen</h5>
            <p class="card-text">Alto rendimiento para gaming y productividad.</p>
            <p class="fw-bold">$89.990</p>
            <a href="#" class="btn btn-primary">Ver más</a>
          </div>
        </div>

      </div>

      <!-- Flecha Derecha -->
      <button class="btn btn-outline-primary mx-2" onclick="scrollDestacados(1)">
        ›
      </button>

    </div>
  </div>
</section>


<!-- SECCION OFERTAS ESPECIALES -->

<section class="py-5 carrousel-cards">
  <div class="container">
    <h2 class="mb-2 text-center">Aprovechá nuestras<span class="fw-bold">ofertas especiales</span></h2>
    <hr class="mx-auto border-primary opacity-75" style="width: 780px; height: 3px;">

    <!-- Contenedor de flechas + carrusel -->
    <div class="d-flex align-items-center justify-content-between mt-4">

      <!-- Flecha Izquierda -->
      <button class="btn btn-outline-primary mx-2" onclick="scrollOfertas(-1)">
        ‹
      </button>

      <!-- Carrusel -->
      <div id="ofertasContainer" class="d-flex carousel-slide carousel-fade overflow-auto gap-3 px-2 scroll-snap-x">
        
        <!-- Card 1 -->
        <div class="card mb-4 card-ofertas">
          <img src="assets/img/banner/img1.png" class="card-img-top" alt="Producto">
          <div class="card-body">
            <h5 class="card-title">Procesador AMD Ryzen</h5>
            <p class="card-text">Alto rendimiento para gaming y productividad.</p>
            <p class="fw-bold">$89.990</p>
            <a href="#" class="btn btn-primary">Ver más</a>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="card mb-4 card-ofertas">
          <img src="assets/img/card.jpg" class="card-img-top" alt="Producto">
          <div class="card-body">
            <h5 class="card-title">Procesador AMD Ryzen</h5>
            <p class="card-text">Alto rendimiento para gaming y productividad.</p>
            <p class="fw-bold">$89.990</p>
            <a href="#" class="btn btn-primary">Ver más</a>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="card mb-4 card-ofertas">
          <img src="assets/img/placa-madre.jpeg" class="card-img-top" alt="Producto">
          <div class="card-body">
            <h5 class="card-title">Procesador AMD Ryzen</h5>
            <p class="card-text">Alto rendimiento para gaming y productividad.</p>
            <p class="fw-bold">$89.990</p>
            <a href="#" class="btn btn-primary">Ver más</a>
          </div>
        </div>

        <!-- Card 4 -->
        <div class="card mb-4 card-ofertas">
          <img src="assets/img/card.jpg" class="card-img-top" alt="Producto">
          <div class="card-body">
            <h5 class="card-title">Procesador AMD Ryzen</h5>
            <p class="card-text">Alto rendimiento para gaming y productividad.</p>
            <p class="fw-bold">$89.990</p>
            <a href="#" class="btn btn-primary">Ver más</a>
          </div>
        </div>

        <!-- Card 5 -->
        <div class="card mb-4 card-ofertas">
          <img src="assets/img/placa-madre.jpeg" class="card-img-top" alt="Producto">
          <div class="card-body">
            <h5 class="card-title">Procesador AMD Ryzen</h5>
            <p class="card-text">Alto rendimiento para gaming y productividad.</p>
            <p class="fw-bold">$89.990</p>
            <a href="#" class="btn btn-primary">Ver más</a>
          </div>
        </div>

        <!-- Card 6 -->
        <div class="card mb-4 card-ofertas">
          <img src="assets/img/card.jpg" class="card-img-top" alt="Producto">
          <div class="card-body">
            <h5 class="card-title">Procesador AMD Ryzen</h5>
            <p class="card-text">Alto rendimiento para gaming y productividad.</p>
            <p class="fw-bold">$89.990</p>
            <a href="#" class="btn btn-primary">Ver más</a>
          </div>
        </div>

        <!-- Card 7 -->
        <div class="card mb-4 card-ofertas">
          <img src="assets/img/placa-madre.jpeg" class="card-img-top" alt="Producto">
          <div class="card-body">
            <h5 class="card-title">Procesador AMD Ryzen</h5>
            <p class="card-text">Alto rendimiento para gaming y productividad.</p>
            <p class="fw-bold">$89.990</p>
            <a href="#" class="btn btn-primary">Ver más</a>
          </div>
        </div>

        <!-- Card 8 -->
        <div class="card mb-4 card-ofertas">
          <img src="assets/img/card.jpg" class="card-img-top" alt="Producto">
          <div class="card-body">
            <h5 class="card-title">Procesador AMD Ryzen</h5>
            <p class="card-text">Alto rendimiento para gaming y productividad.</p>
            <p class="fw-bold">$89.990</p>
            <a href="#" class="btn btn-primary">Ver más</a>
          </div>
        </div>

        <!-- Card 9 -->
        <div class="card mb-4 card-ofertas">
          <img src="assets/img/card.jpg" class="card-img-top" alt="Producto">
          <div class="card-body">
            <h5 class="card-title">Procesador AMD Ryzen</h5>
            <p class="card-text">Alto rendimiento para gaming y productividad.</p>
            <p class="fw-bold">$89.990</p>
            <a href="#" class="btn btn-primary">Ver más</a>
          </div>
        </div>

      </div>

      <!-- Flecha Derecha -->
      <button class="btn btn-outline-primary mx-2" onclick="scrollOfertas(1)">
        ›
      </button>

    </div>
  </div>
</section>


<?= $this->section('scripts') ?>
<script>
  function scrollDestacados(direction) {
  const container = document.getElementById('destacadosContainer');
  const cardWidth = container.querySelector('.card').offsetWidth + 24; // 24 es el gap entre tarjetas
  const currentScrollLeft = container.scrollLeft;
  const newScrollLeft = currentScrollLeft + direction * cardWidth;

  container.style.scrollBehavior = 'smooth';
  container.scrollLeft = newScrollLeft;
}

  function scrollOfertas(direction) {
    const container = document.getElementById('ofertasContainer');
    const scrollAmount = 300 * direction;

    container.scrollBy({
      left: scrollAmount,
      behavior: 'smooth'
    });
  }
</script>
<?= $this->endSection() ?>
<?= $this->endSection() ?>