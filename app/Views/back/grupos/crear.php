<?= $this->extend('layouts/back/plantilla_admin') ?>
<?= $this->section('contenido') ?>
<h2>Crear Grupo Personalizado</h2>
<form method="post" action="<?= base_url('admin/grupos/crear') ?>">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Descripción</label>
        <textarea name="descripcion" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
</form>
<?= $this->endSection() ?>