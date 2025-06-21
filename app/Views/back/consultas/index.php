<?= $this->extend('layouts/back/plantilla_admin') ?>

<?= $this->section('contenido') ?>

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


    <div class="container mt-4">
        <h2>Consultas recibidas</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Asunto</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($consultas as $consulta): ?>
                    <tr>
                        <td><?= $consulta['id'] ?></td>
                        <td><?= esc($consulta['nombre']) ?> (<?= esc($consulta['email']) ?>)</td>
                        <td><?= esc($consulta['asunto']) ?></td>
                        <td><?= date('d/m/Y H:i', strtotime($consulta['created_at'])) ?></td>
                        <td>
                            <span class="badge bg-<?= $consulta['estado'] === 'respondido' ? 'success' : 'warning' ?>">
                                <?= ucfirst($consulta['estado']) ?>
                            </span>
                        </td>
                        <td>
                            <a href="<?= base_url('admin/consultas/ver/' . $consulta['id']) ?>" class="btn btn-sm btn-info">Ver</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <?= $this->endSection() ?>