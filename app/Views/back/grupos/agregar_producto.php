<?= $this->extend('layouts/back/plantilla_admin') ?>
<?= $this->section('contenido') ?>
<h2>Agregar Productos al Grupo Personalizado</h2>
<form method="post">
    <div class="mb-3">
        <label>Productos</label>
        <select name="productos[]" class="form-control" multiple size="10">
            <?php foreach ($productos as $producto): ?>
                <option value="<?= $producto['id'] ?>" <?= in_array($producto['id'], $productosGrupo) ? 'selected' : '' ?>>
                    <?= esc($producto['nombre']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
</form>

<?php if (!empty($productosGrupo)): ?>
    <h4 class="mt-4">Productos en este grupo</h4>
    <ul class="list-group">
        <?php foreach ($productos as $producto): ?>
            <?php if (in_array($producto['id'], $productosGrupo)): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?= esc($producto['nombre']) ?>
                    <form action="<?= base_url('admin/grupos_personalizados/quitar_producto/'.$grupo_id.'/'.$producto['id']) ?>" method="post" style="display:inline;">
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Quitar este producto del grupo?')">Quitar</button>
                    </form>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<?= $this->endSection() ?>