<?= $this->extend('layouts/plantilla_admin') ?>

<?= $this->section('contenido') ?>

<div class="container">
    <h1>Usuarios</h1>
</div>


<div class="container my-4">
    <?php if (session()->getFlashdata('mensaje')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('mensaje') ?>
        </div>
    <?php elseif (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>
    
    <form method="get" class="row g-3 align-items-end mb-4">
        <!-- Filtro por nombre -->
        <div class="col-md-4">
            <label for="nombre" class="form-label">Buscar por nombre o usuario</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= esc($nombre ?? '') ?>">
        </div>

        <!-- Filtro por rol -->
        <div class="col-md-3">
            <label for="rol" class="form-label">Rol</label>
            <select class="form-select" id="rol" name="rol">
                <option value="">Todos</option>
                <?php foreach ($roles as $r): ?>
                    <option value="<?= esc($r) ?>" <?= (isset($rolSeleccionado) && $rolSeleccionado == $r) ? 'selected' : '' ?>>
                        <?= esc(ucfirst($r)) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Filtro por estado -->
        <div class="col-md-3">
            <label for="estado" class="form-label">Estado</label>
            <select class="form-select" id="estado" name="estado">
                <option value="">Todos</option>
                <option value="activo" <?= ($estadoSeleccionado ?? '') === 'activo' ? 'selected' : '' ?>>Activo</option>
                <option value="suspendido" <?= ($estadoSeleccionado ?? '') === 'suspendido' ? 'selected' : '' ?>>Suspendido</option>
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
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Creado</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($usuarios)): ?>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td><?= esc($usuario['nom_usuario']) ?></td>
                            <td><?= esc($usuario['nombre']) ?></td>
                            <td><?= esc($usuario['apellido']) ?></td>
                            <td><?= esc($usuario['email']) ?></td>
                            <td><?= esc($usuario['rol']) ?></td>
                            <td></td>
                            <td>
                                <?= $usuario['baja'] == 0 ? '<span class="badge bg-success">Activo</span>' : '<span class="badge bg-danger">Suspendido</span>' ?>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-link text-dark p-0" type="button" id="dropdownMenuButton<?= $usuario['id'] ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton<?= $usuario['id'] ?>">
                                        <?php if ($usuario['id'] != session()->get('usuario_id')): ?>
                                            <?php if ($usuario['baja']): ?>
                                                <li>
                                                    <a class="dropdown-item" href="<?= base_url('public/admin/usuarios/activar/' . $usuario['id']) ?>">
                                                        <i class="fa-solid fa-user-check me-2"></i>Activar
                                                    </a>
                                                </li>
                                            <?php else: ?>
                                                <li>
                                                    <a class="dropdown-item" href="<?= base_url('public/admin/usuarios/suspender/' . $usuario['id']) ?>">
                                                        <i class="fa-solid fa-user-slash me-2"></i>Suspender
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                            <li>
                                                <a class="dropdown-item text-danger" href="<?= base_url('public/admin/usuarios/eliminar/' . $usuario['id']) ?>" onclick="return confirm('¿Seguro que deseas eliminar este usuario?');">
                                                    <i class="fa-solid fa-trash me-2"></i>Eliminar
                                                </a>
                                            </li>
                                        <?php else: ?>
                                            <li>
                                                <span class="dropdown-item text-muted"><i class="fa-solid fa-lock me-2"></i>Acción no permitida</span>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center">No se encontraron usuarios.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<?= $this->endSection() ?>