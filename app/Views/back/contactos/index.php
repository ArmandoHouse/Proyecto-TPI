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
        <h2>Contactos recibidos</h2>
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
                <?php foreach ($contactos as $contacto): ?>
                    <tr>
                        <td><?= $contacto['id'] ?></td>
                        <td><?= esc($contacto['nombre']) ?> (<?= esc($contacto['email']) ?>)</td>
                        <td><?= esc($contacto['asunto']) ?></td>
                        <td><?= date('d/m/Y H:i', strtotime($contacto['created_at'])) ?></td>
                        <td>
                            <span class="badge bg-<?= $contacto['estado'] === 'respondido' ? 'success' : 'warning' ?>">
                                <?= ucfirst($contacto['estado']) ?>
                            </span>
                        </td>
                        <td>
                            <a href="<?= base_url('admin/contactos/ver/' . $contacto['id']) ?>" class="btn btn-sm btn-info">Ver</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <?= $this->endSection() ?>