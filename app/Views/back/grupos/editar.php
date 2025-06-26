<?= $this->extend('layouts/back/plantilla_admin') ?>
<?= $this->section('contenido') ?>
<h2>Editar Grupo Personalizado</h2>
<form method="post" action="<?= base_url('admin/grupos/editar/'.$grupo['id']) ?>">
    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control" value="<?= esc($grupo['nombre']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Descripción</label>
        <textarea name="descripcion" class="form-control"><?= esc($grupo['descripcion']) ?></textarea>
    </div>
    <button type="submit" class="btn btn-success">Actualizar</button>
</form>
<?= $this->endSection() ?>