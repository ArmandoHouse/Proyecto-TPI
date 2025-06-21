<?= $this->extend('layouts/front/plantilla') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/views/principal.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
<div class="container mt-4">
    <h2><?= esc($consulta['asunto']) ?></h2>
    <p class="text-muted">Consulta realizada el <?= date('d/m/Y H:i', strtotime($consulta['created_at'])) ?></p>

    <div class="card mb-4">
        <div class="card-body">
            <p><?= nl2br(esc($consulta['mensaje'])) ?></p>
        </div>
    </div>

    <?php foreach ($mensajes as $mensaje): ?>
        <div class="mb-4">
            <div class="card <?= $mensaje['usuario_id'] ? 'bg-light' : 'bg-white border' ?>">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-1">
                        <strong>
                            <?= $mensaje['usuario_id'] ? 'Vos' : 'Staff' ?>
                        </strong>
                        <small class="text-muted"><?= date('d/m/Y H:i', strtotime($mensaje['fecha'])) ?></small>
                    </div>
                    <p><?= nl2br(esc($mensaje['mensaje'])) ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <hr>

    <?php if ($consulta['estado'] !== 'cerrado'): ?>
        <h5>Responder</h5>
        <form action="<?= base_url('consultas/responder/' . $consulta['id']) ?>" method="post">
            <div class="mb-3">
                <textarea name="mensaje" rows="4" class="form-control" placeholder="Escribí tu mensaje..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    <?php else: ?>
        <div class="alert alert-info">Esta consulta ha sido cerrada. No se pueden enviar más respuestas.</div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>