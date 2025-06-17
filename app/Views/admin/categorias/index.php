<?= $this->extend('layouts/plantilla_admin') ?>  

<?= $this->section('contenido') ?>

<div class="container mt-4">
    <h2>Gestión de Categorías</h2>

    <a href="<?= base_url('public/admin/categorias/nueva') ?>" class="btn btn-primary mb-3">Agregar Categoría</a>

    <?php if(session()->getFlashdata('mensaje')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('mensaje') ?>
        </div>
    <?php endif; ?>

    <?php if(count($categorias) > 0): ?>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($categorias as $categoria): ?>
                <tr>
                    <td><?= esc($categoria['id']) ?></td>
                    <td><?= esc($categoria['nombre']) ?></td>
                    <td>
                        <form action="<?= base_url('public/admin/categorias/eliminar/'.$categoria['id']) ?>" method="post" onsubmit="return confirm('¿Seguro que querés eliminar esta categoría?');" style="display:inline;">
                            <?= csrf_field() ?>
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No hay categorías cargadas.</p>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>