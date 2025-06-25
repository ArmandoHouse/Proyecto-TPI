<?= $this->extend('layouts/back/plantilla_admin') ?>

<?= $this->section('contenido') ?>

<div class="container my-4" style="max-width:600px;">
    <h2 class="mb-4">Editar Producto</h2>
    <form action="<?= base_url('admin/productos/editar/' . $producto['id']) ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= esc($producto['nombre']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?= esc($producto['descripcion']) ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Imagen actual</label><br>
            <?php if (!empty($producto['imagen'])): ?>
                                    <img src="<?= base_url('assets/img/' . $producto['imagen']) ?>" alt="<?= esc($producto['nombre']) ?>" class="img-fluid" style="max-height: 100px;">
                                <?php else: ?>
                                    <img src="<?= base_url('assets/img/not-found.jpg') ?>" alt="Sin imagen" class="img-fluid" style="max-height: 60px;">
                                <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Nueva imagen (opcional)</label>
            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" value="<?= esc($producto['stock']) ?>" min="0" required>
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="<?= esc($producto['precio']) ?>" min="0" required>
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select class="form-select" id="estado" name="estado" required>
                <option value="disponible" <?= $producto['estado'] === 'disponible' ? 'selected' : '' ?>>Disponible</option>
                <option value="oculto" <?= $producto['estado'] === 'oculto' ? 'selected' : '' ?>>Oculto</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
        <a href="<?= base_url('admin/productos') ?>" class="btn btn-secondary">Cancelar</a>
    </form>
    <form action="<?= base_url('admin/productos/eliminar/' . $producto['id']) ?>" method="post" class="mt-3" onsubmit="return confirm('¿Seguro que deseas eliminar este producto?');">
        <button type="submit" class="btn btn-danger w-100">Eliminar producto</button>
    </form>
</div>

<?= $this->endSection() ?>