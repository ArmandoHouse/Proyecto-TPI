<?= $this->extend('layouts/front/plantilla') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/views/principal.css') ?>">
<style>

</style>

<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
<div class="container py-5">

  <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?= session()->getFlashdata('error') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
    </div>
  <?php endif; ?>

  <div class="row">
    <div class="col-md-6">
      <?php if (!empty($producto['imagen'])): ?>
        <img src="<?= base_url('assets/img/' . $producto['imagen']) ?>" class="card-img-top" alt="<?= esc($producto['nombre']) ?>">
      <?php else: ?>
        <img src="<?= base_url('assets/img/sin-imagen.png') ?>" class="card-img-top" alt="Sin imagen">
      <?php endif; ?>
    </div>
    <div class="col-md-6">
      <h2><?= esc($producto['nombre']) ?></h2>
      <p class="text-muted"><?= esc($producto['descripcion']) ?></p>
      <h4 class="text-primary">$<?= number_format($producto['precio'], 0, ',', '.') ?></h4>

      <div class="mt-4">
        <div class="d-flex align-items-end flex-wrap gap-2">
          <!-- Input de cantidad fuera de los formularios -->
          <div>
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" value="1" min="1" max="<?= esc($producto['stock']) ?>" class="form-control" style="width: 100px;">
          </div>

          <!-- Formulario para agregar al carrito -->
          <form action="<?= base_url('carrito/agregar/' . $producto['id']) ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="cantidad" id="cantidad_carrito" value="1">
            <button type="submit" class="btn btn-primary">Agregar al carrito</button>
          </form>

          <!-- Formulario para comprar ahora -->
          <form action="<?= base_url('pedidos/generar/' . $producto['id']) ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="cantidad" id="cantidad_comprar" value="1">
            <button type="submit" class="btn btn-success">Comprar ahora</button>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>


<script>
  function validarCantidad(e) {
    const cantidad = parseInt(document.getElementById('cantidad').value, 10);
    if (isNaN(cantidad) || cantidad < 1) {
      e.preventDefault();
      alert('La cantidad debe ser mayor o igual a 1.');
      return false;
    }
    return true;
  }

  // Al enviar el formulario de agregar al carrito
  document.querySelector('form[action*="carrito/agregar"]').addEventListener('submit', function(e) {
    if (!validarCantidad(e)) return;
    const cantidad = document.getElementById('cantidad').value;
    document.getElementById('cantidad_carrito').value = cantidad;
  });

  // Al enviar el formulario de comprar ahora
  document.querySelector('form[action*="pedidos/generar"]').addEventListener('submit', function(e) {
    if (!validarCantidad(e)) return;
    const cantidad = document.getElementById('cantidad').value;
    document.getElementById('cantidad_comprar').value = cantidad;
  });
</script>

<?= $this->endSection() ?>