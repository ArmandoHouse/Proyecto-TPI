<?= $this->extend('layouts/plantilla_admin') ?>  

<?= $this->section('contenido') ?>

<div class="container mt-4">
    <h2>Gestión de Categorías</h2>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="<?= base_url('public/admin/categorias/nueva') ?>" class="btn btn-primary">Agregar Categoría</a>
        <?php if (isset($inactivas) && $inactivas): ?>
            <a href="<?= base_url('public/admin/categorias') ?>" class="btn btn-secondary">Ver Activas</a>
        <?php else: ?>
            <a href="<?= base_url('public/admin/categorias/inactivas') ?>" class="btn btn-secondary">Ver Inactivas</a>
        <?php endif; ?>
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

    <?php if (count($categorias) > 0): ?>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categorias as $categoria): ?>
                <tr>
                    <td><?= esc($categoria['id']) ?></td>
                    <td><?= esc($categoria['nombre']) ?></td>
                    <td>
                        <?php if (isset($inactivas) && $inactivas): ?>
                            <a href="<?= base_url('public/admin/categorias/reactivar/' . $categoria['id']) ?>" class="btn btn-success btn-sm">Reactivar</a>
                        <?php else: ?>
                            <a href="<?= base_url('public/admin/categorias/editar/' . $categoria['id']) ?>" class="btn btn-warning btn-sm">Editar</a>
                            <form action="<?= base_url('public/admin/categorias/eliminar/' . $categoria['id']) ?>" method="post" onsubmit="return confirm('¿Seguro que querés eliminar esta categoría?');" style="display:inline;">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn btn-danger btn-sm">Dar de Baja</button>
                            </form>
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