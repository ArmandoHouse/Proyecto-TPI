<?= $this->extend('layouts/front/plantilla') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/views/principal.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>


<div class="container mt-4">
    <h3>Detalle del Pedido</h3>
    <p class="text-muted">Pedido N° <?= $pedido['id'] ?></p>
    <p class="text-muted">Fecha: <?= date('d/m/Y H:i', strtotime($pedido['created_at'])) ?></p>

    <div class="mb-3">
        <h5>Datos del Usuario</h5>
        <p><strong>Nombre:</strong> <?= esc($pedido['usuario_nombre']) . ' ' . esc($pedido['usuario_apellido']) ?></p>
        <p><strong>Email:</strong> <?= esc($pedido['usuario_email']) ?></p>
    </div>

    <h5>Productos del Pedido</h5>
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio unitario</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>
                <?php foreach ($items as $item): ?>
                    <?php $subtotal = $item['precio_unitario'] * $item['cantidad']; $total += $subtotal; ?>
                    <tr>
                        <td><?= esc($item['producto_nombre']) ?></td>
                        <td><?= $item['cantidad'] ?></td>
                        <td>$<?= number_format($item['precio_unitario'], 2, ',', '.') ?></td>
                        <td>$<?= number_format($subtotal, 2, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <h4 class="text-end">Total a pagar: $<?= number_format($total, 2, ',', '.') ?></h4>

    <div class="d-flex gap-2 mt-4">
        <button class="btn btn-secondary" onclick="window.print()">
            <i class="bi bi-printer"></i> Imprimir pedido
        </button>
        <a href="<?= base_url('/') ?>" class="btn btn-primary">
            <i class="bi bi-arrow-left"></i> Seguir comprando
        </a>
    </div>
</div>


<?= $this->endSection() ?>
