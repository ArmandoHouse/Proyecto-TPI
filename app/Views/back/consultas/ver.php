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

    <h2>Detalle de la Consulta</h2>
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Usuario</h5>
            <p class="mb-1"><strong>Alias:</strong> <?= esc($consulta['nombre']) ?> <?= esc($consulta['apellido']) ?></p>
            <p class="mb-1"><strong>Nombre:</strong> <?= esc($consulta['nombre']) ?></p>
            <p class="mb-1"><strong>Apellido:</strong> <?= esc($consulta['apellido']) ?></p>
            <p class="mb-1"><strong>Email:</strong> <?= esc($consulta['email']) ?></p>
            <hr>
            <h5 class="card-title">Asunto</h5>
            <p><?= esc($consulta['asunto']) ?></p>
            <h5 class="card-title">Mensaje</h5>
            <p><?= esc($consulta['mensaje']) ?></p>
            <p class="text-muted"><small>Fecha: <?= date('d/m/Y H:i', strtotime($consulta['created_at'])) ?></small></p>
        </div>
    </div>

    <?php if ($consulta['estado'] !== 'cerrado'): ?>
        <form method="post" action="<?= base_url('admin/consultas/cerrar/' . $consulta['id']) ?>"
            onsubmit="return confirm('¿Estás seguro que deseas cerrar esta consulta? Esta acción no se puede deshacer.');">
            <button type="submit" class="btn btn-danger btn-sm mt-3">
                <i class="bi bi-lock-fill"></i> Cerrar consulta
            </button>
        </form>
    <?php else: ?>
        <div class="alert alert-secondary mt-3">
            <i class="bi bi-info-circle"></i> Esta consulta ya fue cerrada.
        </div>
    <?php endif; ?>

    <h3>Mensajes de la Consulta</h3>

    <?php foreach ($mensajes as $mensaje): ?>
        <div class="mb-4">
            <div class="card <?= $mensaje['usuario_id'] ? 'bg-light' : 'bg-white border' ?>">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-1">
                        <?php if ($mensaje['usuario_id'] == session()->get('usuario_id')): ?>
                            <?= esc(session()->get('username')) ?>
                        <?php else: ?>
                            <?= esc($consulta['username']) ?>
                        <?php endif; ?>
                        <small class="text-muted"><?= date('d/m/Y H:i', strtotime($mensaje['fecha'])) ?></small>
                    </div>
                    <p><?= nl2br(esc($mensaje['mensaje'])) ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <hr>

    <h4>Responder a la consulta</h4>
    <form action="<?= base_url('admin/consultas/responder/' . $consulta['id']) ?>" method="post">
        <div class="mb-3">
            <label for="respuesta" class="form-label">Respuesta</label>
            <textarea class="form-control" id="respuesta" name="respuesta" rows="4" required><?= old('respuesta') ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar respuesta</button>
        <a href="<?= base_url('admin/consultas') ?>" class="btn btn-secondary">Volver</a>
    </form>
</div>


<?= $this->endSection() ?>