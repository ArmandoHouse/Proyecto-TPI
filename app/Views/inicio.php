<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('titulo') ?>
ZonaHW - Venta de Hardware
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<div class="container-fluid">
  <div id="carrousel" class="carousel slide" data-bs-ride="carousel">
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
    <button class="carousel-control-prev" type="button" data-bs-target="#carrousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carrousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>

<div class="container my-5">
  <h2 class="mb-4 text-center">Productos Destacados</h2>

  <div class="row">
    <div class="col-md-3 mb-4">
      <div class="card h-100">
        <img src="" lass="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Producto 1</h5>
        </div>
      </div>
    </div>

    <div class="col-md-3 mb-4">
      <div class="card h-100">
        <img src="" lass="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Producto 1</h5>
        </div>
      </div>
    </div>

    <div class="col-md-3 mb-4">
      <div class="card h-100">
        <img src="" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Producto 1</h5>
        </div>
      </div>
    </div>

    <div class="col-md-3 mb-4">
      <div class="card h-100">
        <img src="" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Producto 1</h5>
        </div>
      </div>
    </div>

    <div class="col-md-3 mb-4">
      <div class="card h-100">
        <img src="" lass="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Producto 1</h5>
        </div>
      </div>
    </div>

    <div class="col-md-3 mb-4">
      <div class="card h-100">
        <img src="" lass="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Producto 1</h5>
        </div>
      </div>
    </div>

    <div class="col-md-3 mb-4">
      <div class="card h-100">
        <img src="" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Producto 1</h5>
        </div>
      </div>
    </div>

    <div class="col-md-3 mb-4">
      <div class="card h-100">
        <img src="" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Producto 1</h5>
        </div>
      </div>
    </div>

  </div>

</div>

<?= $this->endSection() ?>