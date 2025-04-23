<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('titulo') ?>
El Taller - Venta de Hardware
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<h1 class="mb-4">Productos</h1>
    <p>Aquí se listarán los productos de hardware disponibles. Podés incluir imágenes, precios y descripciones para cada uno.</p>

    <div class="container my-5 lista-productos">
  <h2 class="mb-4 text-center">Nuestros Productos</h2>
  
  <div class="row">
    <!-- Tarjeta 1 -->
    <div class="col-md-4 mb-4">
  <div class="card h-100">
    <img src="<?= base_url('plublic/assets/img/productos/auriculares.jpeg') ?>" class="card-img-top" alt="Producto 1">
    <div class="card-body">
      <h5 class="card-title">Producto 1</h5>
      <p class="card-text">Esta es una breve descripción del producto.</p>
    </div>
  </div>
</div>

    <!-- Tarjeta 2 -->
    <div class="col-md-4 mb-4">
  <div class="card h-100">
    <img src="<?= base_url('public/assets/img/productos/memoria8gb.jpeg') ?>" class="card-img-top" alt="Producto 1">
    <div class="card-body">
      <h5 class="card-title">Producto 1</h5>
      <p class="card-text">Esta es una breve descripción del producto.</p>
    </div>
  </div>
</div>

    <!-- Tarjeta 3 -->
    <div class="col-md-4 mb-4">
  <div class="card h-100">
    <img src="<?= base_url('plublic/assets/img/productos/placa-madre.jpeg') ?>" class="card-img-top" alt="Producto 1">
    <div class="card-body">
      <h5 class="card-title">Producto 1</h5>
      <p class="card-text">Esta es una breve descripción del producto.</p>
    </div>
  </div>
</div>
    
    <!-- Más tarjetas... -->
  </div>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<?= $this->endSection() ?>