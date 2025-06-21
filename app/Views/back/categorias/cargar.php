<?= $this->extend('layouts/back/plantilla_admin') ?>

<?= $this->section('contenido') ?>

<div class="container">
  <h2 class="mb-4">Agregar Categoría</h2>

  <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
  <?php endif; ?>

  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
  <?php endif; ?>

  <form action="<?= base_url('admin/categorias/agregar') ?>" method="post">
    <?= csrf_field() ?>

    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre de la categoría</label>
      <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
    <div class="mb-3">
      <label for="descripcion" class="form-label">Descripcion de la categoría</label>
      <input type="text" class="form-control" id="descripcion" name="descripcion" required>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="<?= base_url('admin/categorias/') ?>" class="btn btn-secondary">Cancelar</a>
  </form>
</div>
<?= $this->endSection() ?>
