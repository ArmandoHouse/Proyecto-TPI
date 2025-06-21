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

    <h2>Detalle de la contacto</h2>
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Usuario</h5>
            <p class="mb-1"><strong>Nombre:</strong> <?= esc($contacto['nombre']) ?></p>
            <p class="mb-1"><strong>Email:</strong> <?= esc($contacto['email']) ?></p>
            <hr>
            <h5 class="card-title">Asunto</h5>
            <p><?= esc($contacto['asunto']) ?></p>
            <h5 class="card-title">Mensaje</h5>
            <p><?= esc($contacto['mensaje']) ?></p>
            <p class="text-muted"><small>Fecha: <?= date('d/m/Y H:i', strtotime($contacto['created_at'])) ?></small></p>
        </div>
    </div>

    <form method="post" action="<?= base_url('admin/contactos/cambiar_estado/' . $contacto['id']) ?>">
        <label class="form-label">Estado:</label>
        <select name="estado" class="form-select w-auto d-inline-block">
            <option value="respondido" <?= $contacto['estado'] === 'respondido' ? 'selected' : '' ?>>Respondido</option>
            <option value="cerrado" <?= $contacto['estado'] === 'cerrado' ? 'selected' : '' ?>>Cerrado</option>
        </select>
        <button class="btn btn-sm btn-outline-primary">Actualizar</button>
    </form>
</div>


<?= $this->endSection() ?>