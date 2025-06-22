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

    <h2>Pedidos realizados</h2>
    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th>ID de pedido</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Estado</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pedidos as $pedido): ?>
                <tr>
                    <td><?= $pedido['id'] ?></td>
                    <td><?= date('d/m/Y H:i', strtotime($pedido['created_at'])) ?></td>
                    <td><?= esc($pedido['nombre']) . ' ' . esc($pedido['apellido']) ?><br><small><?= esc($pedido['email']) ?></small></td>
                    <td><?= ucfirst($pedido['estado']) ?></td>
                    <td>$<?= number_format($pedido['total'], 2, ',', '.') ?></td>
                    <td>
                        <a href="<?= base_url('admin/pedidos/ver/' . $pedido['id']) ?>" class="btn btn-sm btn-info">Ver</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>