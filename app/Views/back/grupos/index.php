<?= $this->extend('layouts/back/plantilla_admin') ?>
<?= $this->section('contenido') ?>
<h2>Grupos Personalizados</h2>
<a href="<?= base_url('admin/grupos/crear') ?>" class="btn btn-primary mb-3">Crear Grupo Personalizado</a>
<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($grupos as $grupo): ?>
        <tr>
            <td><?= esc($grupo['nombre']) ?></td>
            <td><?= esc($grupo['descripcion']) ?></td>
            <td>
                <a href="<?= base_url('admin/grupos/editar/'.$grupo['id']) ?>" class="btn btn-warning btn-sm">Editar</a>
                <a href="<?= base_url('admin/grupos/agregar_producto/'.$grupo['id']) ?>" class="btn btn-info btn-sm">Agregar Productos</a>
                <form action="<?= base_url('admin/grupos/eliminar/'.$grupo['id']) ?>" method="post" style="display:inline;" onsubmit="return confirm('¿Seguro que deseas eliminar este grupo?');">
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>