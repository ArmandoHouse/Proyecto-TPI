<?= $this->extend('layouts/plantilla_admin') ?>

<?= $this->section('contenido') ?>

<div class="container">
    <h1>Productos</h1>
</div>

<div class="container">
    <div class="col-md-2">
        <a href="<?= base_url('public/admin/productos/agregar') ?>" class="btn btn-primary w-100">Agregar producto</a>
    </div>
</div>

<div class="container my-4">
    <form method="get" action="<?= base_url('public/admin/productos') ?>" class="row g-3 align-items-end mb-4">
        <div class="col-md-6">
            <label for="busqueda" class="form-label">Buscar por nombre</label>
            <input type="text" class="form-control" id="busqueda" name="busqueda" value="<?= esc($busqueda ?? '') ?>">
        </div>
        <div class="col-md-4">
            <label for="categoria" class="form-label">Categoría</label>
            <select class="form-select" id="categoria" name="categoria">
                <option value="">Todas</option>
                <?php foreach ($categorias as $categoria): ?>
                    <option value="<?= $categoria['id'] ?>" <?= ($categoriaSeleccionada == $categoria['id']) ? 'selected' : '' ?>>
                        <?= esc($categoria['nombre']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Filtrar</button>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Stock</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($productos)): ?>
                    <?php foreach ($productos as $producto): ?>
                        <tr>
                            <td style="width: 100px;">
                                <?php if (!empty($producto['imagen'])): ?>
                                    <img src="<?= base_url('public/assets/img/' . $producto['imagen']) ?>" alt="<?= esc($producto['nombre']) ?>" class="img-fluid" style="max-height: 60px;">
                                <?php else: ?>
                                    <img src="<?= base_url('public/assets/img/not-found.jpg') ?>" alt="Sin imagen" class="img-fluid" style="max-height: 60px;">
                                <?php endif; ?>
                            </td>
                            <td><?= esc($producto['nombre']) ?></td>
                            <td>
                                <?= $producto['baja'] == 0 ? '<span class="badge bg-success">Disponible</span>' : '<span class="badge bg-danger">Deshabilitado</span>' ?>
                            </td>
                            <td><?= esc($producto['stock']) ?></td>
                            <td>$<?= number_format($producto['precio'], 2, ',', '.') ?></td>
                            <td>
                                <a href="<?= base_url('public/admin/productos/editar/' . $producto['id']) ?>" class="btn btn-sm btn-warning">Editar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No se encontraron productos.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>


<?= $this->endSection() ?>