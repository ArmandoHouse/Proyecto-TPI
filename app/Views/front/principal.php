<?= $this->extend('layouts/front/plantilla') ?>

<?= $this->section('titulo') ?>
ZonaHW - Venta de Hardware
<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/views/principal.css') ?>">
<?= $this->endSection() ?>

<?php if (session()->getFlashdata('mensaje')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('mensaje') ?>
    </div>
<?php elseif (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<?= $this->section('contenido') ?>

<!-- Banner carrusel de imágenes -->
<div class="container-fluid p-0">
  <div id="bannerCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="3000">
        <img src="<?= base_url('assets/img/slide1.jpg') ?>" class="d-block w-100 img-fluid" alt="Banner 1">
      </div>
      <div class="carousel-item" data-bs-interval="3000">
        <img src="<?= base_url('assets/img/slide2.jpg') ?>" class="d-block w-100 img-fluid" alt="Banner 2">
      </div>
      <div class="carousel-item" data-bs-interval="3000">
        <img src="<?= base_url('assets/img/slide3.jpg') ?>" class="d-block w-100 img-fluid" alt="Banner 3">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
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
<?php $session = session(); ?>
<?php if ($session->get('rol') == 'admin'): ?>
  <button class="button">Cargar Producto</button>
<?php endif; ?>

<!-- SECCIÓN TODOS LOS PRODUCTOS -->
<section class="py-5">
  <div class="container">
    <h2 class="mb-4 text-center">Todos los productos</h2>
    <div class="row">
      <?php foreach ($productos as $producto): ?>
        <div class="col-md-4 mb-4">
          <div class="card card-producto h-100">
            <?php if (!empty($producto['imagen'])): ?>
              <img src="<?= base_url('assets/img/' . $producto['imagen']) ?>" class="card-img-top" alt="<?= esc($producto['nombre']) ?>">
            <?php else: ?>
              <img src="<?= base_url('assets/img/sin-imagen.png') ?>" class="card-img-top" alt="Sin imagen">
            <?php endif; ?>
            <div class="card-body d-flex flex-column">
              <h5 class="card-title"><?= esc($producto['nombre']) ?></h5>
              <div class="fw-bold fs-5 text-primary mb-2">
                $<?= number_format($producto['precio'], 2, ',', '.') ?>
              </div>
              <a href="<?= base_url('catalogo/ver_producto/' . $producto['id']) ?>" class="btn btn-outline-primary mt-auto">Ver producto</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="text-center mt-4">
      <a href="<?= base_url('catalogo/ver_catalogo') ?>" class="btn btn-primary btn-lg">Ver catálogo completo</a>
    </div>
  </div>
</section>
<?= $this->endSection() ?>