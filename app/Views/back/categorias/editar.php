<?= $this->extend('layouts/back/plantilla_admin') ?>

<?= $this->section('contenido') ?>
<div class="container mt-4" style="max-width:600px;">
    <h2>Editar Categoría</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('admin/categorias/editar/' . $categoria['id']) ?>" method="post">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= esc($categoria['nombre']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3"><?= esc($categoria['descripcion']) ?></textarea>
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select class="form-select" id="estado" name="estado" required>
                <option value="disponible" <?= $categoria['estado'] === 'disponible' ? 'selected' : '' ?>>Disponible</option>
                <option value="oculto" <?= $categoria['estado'] === 'oculto' ? 'selected' : '' ?>>Oculto</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
        <a href="<?= base_url('admin/categorias') ?>" class="btn btn-secondary">Cancelar</a>
    </form>
    <form action="<?= base_url('admin/categorias/eliminar/' . $categoria['id']) ?>" method="post" class="mt-3" onsubmit="return confirm('¿Seguro que deseas eliminar esta categoria?');">
        <button type="submit" class="btn btn-danger w-100">Eliminar categoria</button>
    </form>
</div>
<?= $this->endSection() ?>