<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('public/assets/css/views/catalogo.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<h1>Catalogo de Productos</h1>

<table>
    <thead>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Precio</th>
    </thead>
    <tbody>
        <?php foreach($productos as $producto): ?>
            <tr>
                <td><?php echo $producto['nombre']; ?></td>
                <td><?php echo $producto['descripcion']; ?></td>
                <td><?php echo $producto['precio']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="container">
  <div class="row">
    <!-- Card 1 -->
    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
      <div class="card h-100">
        <img src="<?= base_url('public/assets/img/categorias/' . $producto['imagen']) ?>" alt="Imagen del producto">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
          <p class="card-text"><?php echo $producto['descripcion']; ?></p>
          <p class="fw-bold">$<?php echo $producto['precio']; ?></p>
          <a href="#" class="btn btn-primary mt-auto">Ver más</a>
        </div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
      <div class="card card-destacados h-100">
        <img src="assets/img/card.jpg" class="card-img-top" alt="Producto">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Procesador AMD Ryzen</h5>
          <p class="card-text">Alto rendimiento para gaming y productividad.</p>
          <p class="fw-bold">$89.990</p>
          <a href="#" class="btn btn-primary mt-auto">Ver más</a>
        </div>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
      <div class="card card-destacados h-100">
        <img src="assets/img/placa-madre.jpeg" class="card-img-top" alt="Producto">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Procesador AMD Ryzen</h5>
          <p class="card-text">Alto rendimiento para gaming y productividad.</p>
          <p class="fw-bold">$89.990</p>
          <a href="#" class="btn btn-primary mt-auto">Ver más</a>
        </div>
      </div>
    </div>

    <!-- Card 4 -->
    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
      <div class="card card-destacados h-100">
        <img src="assets/img/card.jpg" class="card-img-top" alt="Producto">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Procesador AMD Ryzen</h5>
          <p class="card-text">Alto rendimiento para gaming y productividad.</p>
          <p class="fw-bold">$89.990</p>
          <a href="#" class="btn btn-primary mt-auto">Ver más</a>
        </div>
      </div>
    </div>

    <!-- Card 5 -->
    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
      <div class="card card-destacados h-100">
        <img src="assets/img/placa-madre.jpeg" class="card-img-top" alt="Producto">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Procesador AMD Ryzen</h5>
          <p class="card-text">Alto rendimiento para gaming y productividad.</p>
          <p class="fw-bold">$89.990</p>
          <a href="#" class="btn btn-primary mt-auto">Ver más</a>
        </div>
      </div>
    </div>

    <!-- Card 6 -->
    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
      <div class="card card-destacados h-100">
        <img src="assets/img/card.jpg" class="card-img-top" alt="Producto">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Procesador AMD Ryzen</h5>
          <p class="card-text">Alto rendimiento para gaming y productividad.</p>
          <p class="fw-bold">$89.990</p>
          <a href="#" class="btn btn-primary mt-auto">Ver más</a>
        </div>
      </div>
    </div>

    <!-- Card 7 -->
    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
      <div class="card card-destacados h-100">
        <img src="assets/img/placa-madre.jpeg" class="card-img-top" alt="Producto">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Procesador AMD Ryzen</h5>
          <p class="card-text">Alto rendimiento para gaming y productividad.</p>
          <p class="fw-bold">$89.990</p>
          <a href="#" class="btn btn-primary mt-auto">Ver más</a>
        </div>
      </div>
    </div>

    <!-- Card 8 -->
    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
      <div class="card card-destacados h-100">
        <img src="assets/img/card.jpg" class="card-img-top" alt="Producto">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Procesador AMD Ryzen</h5>
          <p class="card-text">Alto rendimiento para gaming y productividad.</p>
          <p class="fw-bold">$89.990</p>
          <a href="#" class="btn btn-primary mt-auto">Ver más</a>
        </div>
      </div>
    </div>

    <!-- Card 9 -->
    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
      <div class="card card-destacados h-100">
        <img src="assets/img/card.jpg" class="card-img-top" alt="Producto">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Procesador AMD Ryzen</h5>
          <p class="card-text">Alto rendimiento para gaming y productividad.</p>
          <p class="fw-bold">$89.990</p>
          <a href="#" class="btn btn-primary mt-auto">Ver más</a>
        </div>
      </div>
    </div>
  </div>
</div>


<?= $this->endSection() ?>