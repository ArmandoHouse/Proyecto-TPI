<?= $this->extend('layouts/front/plantilla') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/views/principal.css') ?>">
<style>

</style>

<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
<div class="container py-5">
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
            <input type="number" name="cantidad" id="cantidad" value="1" min="1" class="form-control" style="width: 100px;">
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
  document.getElementById('cantidad').addEventListener('input', function () {
    document.getElementById('cantidad_carrito').value = this.value;
    document.getElementById('cantidad_comprar').value = this.value;
  });
</script>

<?= $this->endSection() ?>