<?= $this->extend('layouts/front/plantilla') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/views/principal.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
<div class="container mt-4">
    <h2>Mis consultas</h2>

    <a href="<?= base_url('consultas/crear') ?>" class="btn btn-primary mb-3">Nueva consulta</a>

    <?php if (empty($consultas)): ?>
        <div class="alert alert-info">Aún no enviaste ninguna consulta.</div>
    <?php else: ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($consultas as $consulta): ?>
                    <tr>
                        <td><?= esc($consulta['asunto']) ?></td>
                        <td><?= date('d/m/Y', strtotime($consulta['created_at'])) ?></td>
                        <td>
                            <span class="badge bg-<?= $consulta['estado'] === 'respondido' ? 'success' : 'secondary' ?>">
                                <?= ucfirst($consulta['estado']) ?>
                            </span>
                        </td>
                        <td>
                            <a href="<?= base_url('consultas/ver/' . $consulta['id']) ?>" class="btn btn-sm btn-info">Ver</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php endif ?>
</div>
<?= $this->endSection() ?>
