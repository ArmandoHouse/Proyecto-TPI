<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('public/assets/css/views/catalogo.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<h1>Catalogo de Productos</h1>

  <div class="container">
    <div class="row">

        <?php foreach($productos as $producto): ?>
                
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
        <?php endforeach; ?>

    </div>
  </div>
    

<?= $this->endSection() ?>