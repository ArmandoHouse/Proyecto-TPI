<?= $this->extend('layouts/front/plantilla') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/views/principal.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
<div class="container my-4">
    <h2>Mis pedidos</h2>
    <?php if (session()->getFlashdata('mensaje')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('mensaje') ?></div>
    <?php endif; ?>
    <?php if (!empty($pedidos)): ?>
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pedidos as $pedido): ?>
                        <tr>
                            <td><?= $pedido['id'] ?></td>
                            <td><?= date('d/m/Y H:i', strtotime($pedido['created_at'])) ?></td>
                            <td>$<?= number_format($pedido['total'], 2, ',', '.') ?></td>
                            <td>
                                <a href="<?= base_url('pedidos/ver/' . $pedido['id']) ?>" class="btn btn-sm btn-info">
                                    Ver
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-info">No tienes pedidos realizados.</div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>
