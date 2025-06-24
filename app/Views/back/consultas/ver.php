<?= $this->extend('layouts/back/plantilla_admin') ?>

<?= $this->section('contenido') ?>

<div class="container py-5">
    <!-- Mensajes de sesión -->
    <?php if (session()->getFlashdata('mensaje')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('mensaje') ?>
        </div>
    <?php elseif (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <h2 class="mb-4">Detalle de la Consulta</h2>

    <!-- Información del usuario -->
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Información del Usuario</h5>
            <p class="mb-1"><strong>Nombre Completo:</strong> <?= esc($consulta['nombre'] . ' ' . $consulta['apellido']) ?></p>
            <p class="mb-1"><strong>Email:</strong> <?= esc($consulta['email']) ?></p>
        </div>
    </div>

    <!-- Detalle de la consulta -->
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Detalle de la Consulta</h5>
            <p class="mb-1"><strong>Asunto:</strong> <?= esc($consulta['asunto']) ?></p>
            <p class="mb-1"><strong>Mensaje:</strong></p>
            <p><?= esc($consulta['mensaje']) ?></p>
            <p class="text-muted"><small>Fecha: <?= date('d/m/Y H:i', strtotime($consulta['created_at'])) ?></small></p>
        </div>
    </div>

       <!-- Respuestas enviadas -->
       <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Respuestas Enviadas</h5>
            <?php if (!empty($mensajes)): ?>
                <ul class="list-group">
                    <?php foreach ($mensajes as $mensaje): ?>
                        <li class="list-group-item">
                            <p class="mb-1"><strong>Respuesta:</strong> <?= esc($mensaje['mensaje']) ?></p>
                            <p class="text-muted"><small>Fecha: <?= date('d/m/Y H:i', strtotime($mensaje['fecha'])) ?></small></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p class="text-muted">No se han enviado respuestas aún.</p>
            <?php endif; ?>
        </div>
    </div>

        <!-- Formulario para responder -->
        <?php if ($consulta['estado'] !== 'cerrado'): ?>
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Responder Consulta</h5>
                <form method="post" action="<?= base_url('admin/consultas/responder/' . $consulta['id']) ?>">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="respuesta" class="form-label">Respuesta</label>
                        <textarea name="respuesta" id="respuesta" class="form-control" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-send"></i> Enviar Respuesta
                    </button>
                </form>
            </div>
        </div>
        
         <!-- Botón para cerrar consulta -->
         <form method="post" action="<?= base_url('admin/consultas/cerrar/' . $consulta['id']) ?>"
            onsubmit="return confirm('¿Estás seguro que deseas cerrar esta consulta? Esta acción no se puede deshacer.');">
            <button type="submit" class="btn btn-danger mt-3">
                <i class="bi bi-lock-fill"></i> Cerrar Consulta
            </button>
        </form>
    <?php else: ?>
        <div class="alert alert-secondary mt-3">
            <i class="bi bi-info-circle"></i> Esta consulta ya fue cerrada.
        </div>
    <?php endif; ?>

    <!-- Botón para regresar -->
    <div class="mt-4">
        <a href="<?= base_url('admin/consultas') ?>" class="btn btn-primary">
            <i class="bi bi-arrow-left"></i> Regresar a consultas
        </a>
    </div>
</div>


<?= $this->endSection() ?>