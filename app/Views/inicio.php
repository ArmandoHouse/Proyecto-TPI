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

<h2 class="mb-2">Conocé nuestros <span class="fw-bold">productos destacados</span></h2>

  <hr class="mx-auto border-danger opacity-75" style="width: 780px; height: 3px;">
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
            <a href="#" class="btn btn-danger mt-3">Ver más</a>
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
            <a href="#" class="btn btn-danger mt-3">Ver más</a>
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
            <a href="#" class="btn btn-danger mt-3">Ver más</a>
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
            <a href="#" class="btn btn-danger mt-3">Ver más</a>
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
            <a href="#" class="btn btn-danger mt-3">Ver más</a>
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
            <a href="#" class="btn btn-danger mt-3">Ver más</a>
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

<!-- SECCION OFERTAS ESPECIALES -->

<section class="py-5 carrousel-cards ofertas">

  <!-- Carrousel con cards -->

  <div id="carouselOfertas" class="carousel slide" data-bs-ride="carousel">
  <h2 class="mb-2">Aprovechá nuestras <span class="fw-bold">ofertas especiales</span></h2>
  <hr class="mx-auto border-danger opacity-75" style="width: 780px; height: 3px;">
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
            <a href="#" class="btn btn-danger mt-3">Ver más</a>
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
            <a href="#" class="btn btn-danger mt-3">Ver más</a>
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
            <a href="#" class="btn btn-danger mt-3">Ver más</a>
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
            <a href="#" class="btn btn-danger mt-3">Ver más</a>
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
            <a href="#" class="btn btn-danger mt-3">Ver más</a>
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
            <a href="#" class="btn btn-danger mt-3">Ver más</a>
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

<!-- SECCION CATEGORIAS -->

<section class="py-5">
  <div class="container">

    <h2 class="mb-2">Explorá nuestras <span class="fw-bold">categorías</span></h2>
    <hr class="mx-auto border-danger opacity-75" style="width: 780px; height: 3px;">

    <div id="categoriasCarousel" class="carousel slide" data-bs-ride="carousel">
      
      <div class="carousel-inner">

        <!-- Slide 1 -->
        <div class="carousel-item active">
          <div class="row g-3">

            <!-- Primera fila -->
            <div class="col-6 col-sm-4 col-md-3">
              <div class="card categoria-card border-0 overflow-hidden rounded-4">
                <div class="position-relative">
                  <img src="assets/img/categorias/procesadores.jpg" class="card-img-top" alt="Procesadores">
                  <div class="card-img-overlay d-flex align-items-end p-0">
                    <div class="w-100 text-center bg-dark bg-opacity-50 py-2">
                      <h5 class="card-title text-white mb-0">Procesadores</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Más cards para completar 4 en la fila -->
            <div class="col-6 col-sm-4 col-md-3">
              <div class="card categoria-card border-0 overflow-hidden rounded-4">
                <div class="position-relative">
                  <img src="assets/img/categorias/notebooks.jpg" class="card-img-top" alt="Procesadores">
                  <div class="card-img-overlay d-flex align-items-end p-0">
                    <div class="w-100 text-center bg-dark bg-opacity-50 py-2">
                      <h5 class="card-title text-white mb-0">Notebooks</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-6 col-sm-4 col-md-3">
              <div class="card categoria-card border-0 overflow-hidden rounded-4">
                <div class="position-relative">
                  <img src="assets/img/categorias/monitores.jpg" class="card-img-top" alt="Procesadores">
                  <div class="card-img-overlay d-flex align-items-end p-0">
                    <div class="w-100 text-center bg-dark bg-opacity-50 py-2">
                      <h5 class="card-title text-white mb-0">Monitores</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-6 col-sm-4 col-md-3">
              <div class="card categoria-card border-0 overflow-hidden rounded-4">
                <div class="position-relative">
                  <img src="assets/img/categorias/ram.jpg" class="card-img-top" alt="Procesadores">
                  <div class="card-img-overlay d-flex align-items-end p-0">
                    <div class="w-100 text-center bg-dark bg-opacity-50 py-2">
                      <h5 class="card-title text-white mb-0">Memorias RAM</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Segunda fila -->
            <div class="col-6 col-sm-4 col-md-3">
              <div class="card categoria-card border-0 overflow-hidden rounded-4">
                <div class="position-relative">
                  <img src="assets/img/categorias/perifericos.jpg" class="card-img-top" alt="Memorias RAM">
                  <div class="card-img-overlay d-flex align-items-end p-0">
                    <div class="w-100 text-center bg-dark bg-opacity-50 py-2">
                      <h5 class="card-title text-white mb-0">Perifericos</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Más cards para completar 4 en la fila -->
            <div class="col-6 col-sm-4 col-md-3">
              <div class="card categoria-card border-0 overflow-hidden rounded-4">
                <div class="position-relative">
                  <img src="assets/img/categorias/placa-video.jpg" class="card-img-top" alt="Procesadores">
                  <div class="card-img-overlay d-flex align-items-end p-0">
                    <div class="w-100 text-center bg-dark bg-opacity-50 py-2">
                      <h5 class="card-title text-white mb-0">Placas de Video</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-6 col-sm-4 col-md-3">
              <div class="card categoria-card border-0 overflow-hidden rounded-4">
                <div class="position-relative">
                  <img src="assets/img/categorias/gabinetes.jpg" class="card-img-top" alt="Procesadores">
                  <div class="card-img-overlay d-flex align-items-end p-0">
                    <div class="w-100 text-center bg-dark bg-opacity-50 py-2">
                      <h5 class="card-title text-white mb-0">Gabinetes</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-6 col-sm-4 col-md-3">
              <div class="card categoria-card border-0 overflow-hidden rounded-4">
                <div class="position-relative">
                  <img src="assets/img/categorias/almacenamiento.jpg" class="card-img-top" alt="Procesadores">
                  <div class="card-img-overlay d-flex align-items-end p-0">
                    <div class="w-100 text-center bg-dark bg-opacity-50 py-2">
                      <h5 class="card-title text-white mb-0">Almacenamiento</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- Slide 2 (otras categorías) -->
        <div class="carousel-item">
          <div class="row g-3">
            
          <div class="col-6 col-sm-4 col-md-3">
              <div class="card categoria-card border-0 overflow-hidden rounded-4">
                <div class="position-relative">
                  <img src="assets/img/categorias/placa-madre.jpg" class="card-img-top" alt="Procesadores">
                  <div class="card-img-overlay d-flex align-items-end p-0">
                    <div class="w-100 text-center bg-dark bg-opacity-50 py-2">
                      <h5 class="card-title text-white mb-0">Placa Madre</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-6 col-sm-4 col-md-3">
              <div class="card categoria-card border-0 overflow-hidden rounded-4">
                <div class="position-relative">
                  <img src="assets/img/categorias/impresoras.jpg" class="card-img-top" alt="Procesadores">
                  <div class="card-img-overlay d-flex align-items-end p-0">
                    <div class="w-100 text-center bg-dark bg-opacity-50 py-2">
                      <h5 class="card-title text-white mb-0">Impresoras</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-6 col-sm-4 col-md-3">
              <div class="card categoria-card border-0 overflow-hidden rounded-4">
                <div class="position-relative">
                  <img src="assets/img/categorias/equipos.jpg" class="card-img-top" alt="Procesadores">
                  <div class="card-img-overlay d-flex align-items-end p-0">
                    <div class="w-100 text-center bg-dark bg-opacity-50 py-2">
                      <h5 class="card-title text-white mb-0">Equipos Armados</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-6 col-sm-4 col-md-3">
              <div class="card categoria-card border-0 overflow-hidden rounded-4">
                <div class="position-relative">
                  <img src="assets/img/placa-madre.jpeg" class="card-img-top" alt="Procesadores">
                  <div class="card-img-overlay d-flex align-items-end p-0">
                    <div class="w-100 text-center bg-dark bg-opacity-50 py-2">
                      <h5 class="card-title text-white mb-0">Procesadores</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-6 col-sm-4 col-md-3">
              <div class="card categoria-card border-0 overflow-hidden rounded-4">
                <div class="position-relative">
                  <img src="assets/img/placa-madre.jpeg" class="card-img-top" alt="Procesadores">
                  <div class="card-img-overlay d-flex align-items-end p-0">
                    <div class="w-100 text-center bg-dark bg-opacity-50 py-2">
                      <h5 class="card-title text-white mb-0">Procesadores</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-6 col-sm-4 col-md-3">
              <div class="card categoria-card border-0 overflow-hidden rounded-4">
                <div class="position-relative">
                  <img src="assets/img/placa-madre.jpeg" class="card-img-top" alt="Procesadores">
                  <div class="card-img-overlay d-flex align-items-end p-0">
                    <div class="w-100 text-center bg-dark bg-opacity-50 py-2">
                      <h5 class="card-title text-white mb-0">Procesadores</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>

      <!-- Indicadores -->
      <div class="carousel-indicators mt-4">
        <button type="button" data-bs-target="#categoriasCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#categoriasCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      </div>

    </div>

  </div>
</section>



<?= $this->endSection() ?>