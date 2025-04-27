<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('titulo') ?>
ZonaHW - Venta de Hardware
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<style>
  div.container-fluid {
    padding-left: 0;
    padding-right: 0;
  }
</style>

<div class="container-fluid">
  <div id="c-1" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="assets/img/slide4.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
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

<div class="container my-5">
  <h2 class="fw-bold mb-4">Nuestras Categorías</h2>

  <div class="row">
    <div class="col-3 mb-4">
      <div class="card h-100">
        <img src="assets/img/card.jpg" lass="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Producto 1</h5>
        </div>
      </div>
    </div>

    <div class="col-3 mb-4">
      <div class="card h-100">
        <img src="assets/img/card.jpg" lass="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Producto 1</h5>
        </div>
      </div>
    </div>

    <div class="col-3 mb-4">
      <div class="card h-100">
        <img src="assets/img/card.jpg" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Producto 1</h5>
        </div>
      </div>
    </div>

    <div class="col-3 mb-4">
      <div class="card h-100">
        <img src="assets/img/card.jpg" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Producto 1</h5>
        </div>
      </div>
    </div>

    <div class="col-3 mb-4">
      <div class="card h-100">
        <img src="assets/img/card.jpg" lass="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Producto 1</h5>
        </div>
      </div>
    </div>

    <div class="col-3 mb-4">
      <div class="card h-100">
        <img src="assets/img/card.jpg" lass="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Producto 1</h5>
        </div>
      </div>
    </div>

    <div class="col-3 mb-4">
      <div class="card h-100">
        <img src="assets/img/card.jpg" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Producto 1</h5>
        </div>
      </div>
    </div>

    <div class="col-3 mb-4">
      <div class="card h-100">
        <img src="assets/img/card.jpg" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">Producto 1</h5>
        </div>
      </div>
    </div>
  </div>
</div>


<div id="cont" class="container my-3">
  <h2 class="fw-bold">Productos</h2>

  <div class="row justify-content-center">
    <div id="mc-1" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <div class="col-md-3">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/card.jpg" class="img-fluid">
              </div>
              <div class="card-img-overlay">Slide 1</div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="col-md-3">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/card.jpg" class="img-fluid">
              </div>
              <div class="card-img-overlay">Slide 2</div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="col-md-3">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/card.jpg" class="img-fluid">
              </div>
              <div class="card-img-overlay">Slide 3</div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="col-md-3">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/card.jpg" class="img-fluid">
              </div>
              <div class="card-img-overlay">Slide 4</div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="col-md-3">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/card.jpg" class="img-fluid">
              </div>
              <div class="card-img-overlay">Slide 5</div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="col-md-3">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/card.jpg" class="img-fluid">
              </div>
              <div class="card-img-overlay">Slide 6</div>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev bg-transparent w-aut" href="#mc-1" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      </a>
      <a class="carousel-control-next bg-transparent w-aut" href="#mc-1" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
      </a>
    </div>
  </div>
</div>

<div id="cont" class="container my-3">
  <h2 class="fw-bold">Productos</h2>

  <div class="row justify-content-center">
    <div id="mc-2" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <div class="col-md-3">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/card.jpg" class="img-fluid">
              </div>
              <div class="card-img-overlay">Slide 1</div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="col-md-3">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/card.jpg" class="img-fluid">
              </div>
              <div class="card-img-overlay">Slide 2</div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="col-md-3">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/card.jpg" class="img-fluid">
              </div>
              <div class="card-img-overlay">Slide 3</div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="col-md-3">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/card.jpg" class="img-fluid">
              </div>
              <div class="card-img-overlay">Slide 4</div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="col-md-3">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/card.jpg" class="img-fluid">
              </div>
              <div class="card-img-overlay">Slide 5</div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="col-md-3">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/card.jpg" class="img-fluid">
              </div>
              <div class="card-img-overlay">Slide 6</div>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev bg-transparent w-aut" href="#mc-2" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      </a>
      <a class="carousel-control-next bg-transparent w-aut" href="#mc-2" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
      </a>
    </div>
  </div>
</div>

<div id="cont" class="container my-3">
  <h2 class="fw-bold mb-2 my-4">Productos</h2>

  <div class="row justify-content-center">
    <div id="mc-3" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <div class="col-md-3">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/card.jpg" class="img-fluid">
              </div>
              <div class="card-img-overlay">Slide 1</div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="col-md-3">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/card.jpg" class="img-fluid">
              </div>
              <div class="card-img-overlay">Slide 2</div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="col-md-3">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/card.jpg" class="img-fluid">
              </div>
              <div class="card-img-overlay">Slide 3</div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="col-md-3">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/card.jpg" class="img-fluid">
              </div>
              <div class="card-img-overlay">Slide 4</div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="col-md-3">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/card.jpg" class="img-fluid">
              </div>
              <div class="card-img-overlay">Slide 5</div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="col-md-3">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/card.jpg" class="img-fluid">
              </div>
              <div class="card-img-overlay">Slide 6</div>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev bg-transparent w-aut" href="#mc-3" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      </a>
      <a class="carousel-control-next bg-transparent w-aut" href="#mc-3" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
      </a>
    </div>
  </div>
</div>

<style>
  @media (max-width: 767px) {
    .carousel-inner .carousel-item>div {
      display: none;
    }

    .carousel-inner .carousel-item>div:first-child {
      display: block;
    }
  }

  .carousel-item .card {
    margin-right: 10px;
  }

  .carousel-inner .carousel-item.active,
  .carousel-inner .carousel-item-next,
  .carousel-inner .carousel-item-prev {
    display: flex;
  }

  /* medium and up screens */
  @media (min-width: 768px) {

    .carousel-inner .carousel-item-end.active,
    .carousel-inner .carousel-item-next {
      transform: translateX(25%);
    }

    .carousel-inner .carousel-item-start.active,
    .carousel-inner .carousel-item-prev {
      transform: translateX(-25%);
    }
  }

  .carousel-inner .carousel-item-end,
  .carousel-inner .carousel-item-start {
    transform: translateX(0);
  }
</style>

<script>
  let items = document.querySelectorAll('#cont .carousel .carousel-item')

  items.forEach((el) => {
    const minPerSlide = 4
    let next = el.nextElementSibling
    for (var i = 1; i < minPerSlide; i++) {
      if (!next) {
        // wrap carousel by using first child
        next = items[0]
      }
      let cloneChild = next.cloneNode(true)
      el.appendChild(cloneChild.children[0])
      next = next.nextElementSibling
    }
  })
</script>

<?= $this->endSection() ?>