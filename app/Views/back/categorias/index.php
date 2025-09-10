<?= $this->extend('layouts/back/plantilla_admin') ?>

<?= $this->section('contenido') ?>

<div class="container mt-4">
    <h2>Gestión de Categorías</h2>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="<?= base_url('admin/categorias/agregar') ?>" class="btn btn-primary">Agregar Categoría</a>
    </div>

    <?php if (session()->getFlashdata('mensaje')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('mensaje') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form method="get" class="row g-3 mb-3">
        <div class="col-md-3">
            <input type="text" name="id" value="<?= esc($filtros['id'] ?? '') ?>" class="form-control" placeholder="Buscar por ID">
        </div>
        <div class="col-md-4">
            <input type="text" name="nombre" value="<?= esc($filtros['nombre'] ?? '') ?>" class="form-control" placeholder="Buscar por nombre">
        </div>
        <div class="col-md-3">
            <select name="estado" class="form-select">
                <option value="">Todos</option>
                <option value="disponible" <?= (isset($filtros['estado']) && $filtros['estado'] === 'disponible') ? 'selected' : '' ?>>Disponible</option>
                <option value="oculto" <?= (isset($filtros['estado']) && $filtros['estado'] === 'oculto') ? 'selected' : '' ?>>Oculto</option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Filtrar</button>
        </div>
    </form>

    <?php if (count($categorias) > 0): ?>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categorias as $categoria): ?>
                    <tr>
                        <td><?= esc($categoria['id']) ?></td>
                        <td><?= esc($categoria['nombre']) ?></td>
                        <td>
                            <?= $categoria['estado'] == 'disponible' ? '<span class="badge bg-success">Disponible</span>' : '<span class="badge bg-danger">Oculto</span>' ?>
                        </td>
                        <td>
                            <?php if (isset($inactivas) && $inactivas): ?>
                                <a href="<?= base_url('admin/categorias/reactivar/' . $categoria['id']) ?>" class="btn btn-success btn-sm">Reactivar</a>
                            <?php else: ?>
                                <a href="<?= base_url('admin/categorias/editar/' . $categoria['id']) ?>" class="btn btn-warning btn-sm">Editar</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info text-center">
            No hay categorías <?= isset($inactivas) && $inactivas ? 'inactivas' : 'activas' ?>.
        </div>
    <?php endif; ?>
</div>


<?= $this->endSection() ?>