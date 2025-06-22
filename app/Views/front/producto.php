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

      <form action="<?= base_url('carrito/agregar/' . $producto['id']) ?>" method="post" class="mt-4">
        <?= csrf_field() ?>
        <div class="mb-3">
          <label for="cantidad" class="form-label">Cantidad</label>
          <input type="number" name="cantidad" id="cantidad" value="1" min="1" class="form-control" style="width: 100px;">
        </div>
      </form>
      <button type="submit" class="btn btn-primary">Agregar al carrito</button>
      <a href="<?= base_url('carrito/comprar/' . $producto['id']) ?>" method="post" class="btn btn-primary ms-2">Comprar ahora</a>
    </div>
  </div>
</div>

<?= $this->endSection() ?>