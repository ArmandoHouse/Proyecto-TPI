<?= $this->extend('layouts/front/plantilla') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/views/front/pedidos/ver.css') ?>">
<style>
    .invoice-header {
        border-bottom: 3px solid #0d6efd;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
    }
    .invoice-title {
        font-size: 2rem;
        font-weight: 700;
        color: #21242aff;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .invoice-subtitle {
        font-size: 1rem;
        color: #4b5156ff;
    }
    .info-box {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: .5rem;
        padding: 1rem;
        margin-bottom: 1rem;
    }
    .info-box h5 {
        color: #0d6efd;
        font-weight: 600;
        margin-bottom: .75rem;
    }
    .table th {
        background-color: #e9ecef;
        font-weight: 600;
        color: #212529;
    }
    .totals p {
        margin-bottom: .3rem;
        font-size: 1.05rem;
    }
    .totals strong {
        color: #212529;
    }
    .totals .total-final {
        font-size: 1.5rem;
        font-weight: 700;
        color: #0d6efd;
    }
    @media print {
        .btn, .d-md-flex { display: none !important; }
        body { background: #fff; }
        .card { border: none !important; box-shadow: none !important; }
        .invoice-title { color: #000 !important; }
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
<div class="container-fluid py-4">
    <div class="container">

        <!-- Botones -->
        <div class="row mb-4">
            <div class="col-12 d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="<?= base_url('catalogo/ver_catalogo') ?>" class="btn btn-outline-primary">
                    <i class="bi bi-cart-plus me-2"></i> Continuar Comprando
                </a>
                <button onclick="window.print()" class="btn btn-secondary" type="button">
                    <i class="bi bi-printer me-2"></i> Imprimir
                </button>
            </div>
        </div>

        <!-- Factura -->
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="invoice-header d-flex justify-content-between align-items-center">
                    <div>
                        <div class="invoice-title">Factura de Compra</div>
                        <div class="invoice-subtitle">ZonaHardware - Comprobante Electrónico</div>
                    </div>
                    <div class="text-end">
                        <span class="fw-bold">N°: <?= esc($pedidoData['invoice']['number'] ?? '-') ?></span><br>
                        <span>Fecha: <?= esc($pedidoData['invoice']['date'] ?? '-') ?></span>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="info-box">
                            <h5>Datos del Cliente</h5>
                            <p><strong>Nombre:</strong> <?= esc($pedidoData['client']['name'] ?? '-') ?></p>
                            <p><strong>Email:</strong> <?= esc($pedidoData['client']['email'] ?? '-') ?></p>
                            <p><strong>DNI:</strong> <?= esc($pedidoData['client']['dni'] ?? '-') ?></p>
                            <p><strong>Teléfono:</strong> <?= esc($pedidoData['client']['phone'] ?? '-') ?></p>
                            <p><strong>Dirección:</strong> <?= esc($pedidoData['client']['address'] ?? '-') ?></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box">
                            <h5>Detalles de Facturación</h5>
                            <p><strong>Condición de venta:</strong> Contado</p>
                            <p><strong>Estado:</strong> <?= esc($pedidoData['invoice']['status'] ?? 'Pendiente') ?></p>
                        </div>
                    </div>
                </div>

                <!-- Productos -->
                <h5 class="mb-3">Productos</h5>
                <div class="d-none d-md-block">
                    <table class="table table-bordered align-middle">
                        <thead class="text-center">
                            <tr>
                                <th>Producto</th>
                                <th width="10%">Cantidad</th>
                                <th width="20%">Precio unitario</th>
                                <th width="20%">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($pedidoData['products'])): ?>
                                <?php foreach ($pedidoData['products'] as $prod): ?>
                                    <tr>
                                        <td><?= esc($prod['name']) ?></td>
                                        <td class="text-center"><?= esc($prod['quantity']) ?></td>
                                        <td class="text-end">$<?= number_format($prod['unitPrice'], 2, ',', '.') ?></td>
                                        <td class="text-end">$<?= number_format($prod['subtotal'], 2, ',', '.') ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center">No hay productos en este pedido.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Mobile -->
                <div class="d-block d-md-none">
                    <?php if (!empty($pedidoData['products'])): ?>
                        <?php foreach ($pedidoData['products'] as $prod): ?>
                            <div class="card mb-2">
                                <div class="card-body p-2">
                                    <div class="d-flex justify-content-between">
                                        <span><?= esc($prod['name']) ?></span>
                                        <span class="fw-bold">$<?= number_format($prod['subtotal'], 2, ',', '.') ?></span>
                                    </div>
                                    <div class="small text-muted">
                                        Cantidad: <?= esc($prod['quantity']) ?> | Precio unit.: $<?= number_format($prod['unitPrice'], 2, ',', '.') ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="text-center">No hay productos en este pedido.</div>
                    <?php endif; ?>
                </div>

                <!-- Totales -->
                <div class="totals text-end mt-4">
                    <p><strong>Subtotal:</strong> $<?= number_format($pedidoData['totals']['subtotal'] ?? 0, 2, ',', '.') ?></p>
                    <p><strong>IVA (21%):</strong> $<?= number_format($pedidoData['totals']['tax'] ?? 0, 2, ',', '.') ?></p>
                    <p class="total-final"><strong>Total:</strong> $<?= number_format($pedidoData['totals']['total'] ?? 0, 2, ',', '.') ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
