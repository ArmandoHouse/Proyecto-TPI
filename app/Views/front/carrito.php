<?= $this->extend('layouts/front/plantilla') ?>

<?= $this->section('titulo') ?>Carrito - ZonaHardware<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/views/principal.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<div class="container py-5">
    <?php if (session()->getFlashdata('mensaje')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('mensaje') ?>
        </div>
    <?php elseif (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>


    <h2 class="mb-4">Tu carrito</h2>

    <?php if (empty($carrito)) : ?>
        <div class="alert alert-info">Tu carrito está vacío.</div>
        <a href="<?= site_url('catalogo/ver_catalogo/1') ?>" class="btn btn-primary">Ir al catálogo</a>
    <?php else : ?>
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Imagen</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($carrito as $item) :
                    $subtotal = $item['precio'] * $item['cantidad'];
                    $total += $subtotal;
                ?>
                    <tr>
                        <td style="width: 100px;">
                            <img src="<?= base_url('assets/img/' . $item['imagen']) ?>" class="img-fluid rounded" alt="<?= esc($item['nombre']) ?>">
                        </td>
                        <td><?= esc($item['nombre']) ?></td>
                        <td>$<?= number_format($item['precio'], 0, ',', '.') ?></td>
                        <td><?= $item['cantidad'] ?></td>
                        <td>$<?= number_format($subtotal, 0, ',', '.') ?></td>
                        <td>
                            <form action="<?= base_url('carrito/eliminar/' . $item['carrito_id']) ?>" method="post">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="text-end fw-bold">Total:</td>
                    <td colspan="2" class="fw-bold">$<?= number_format($total, 0, ',', '.') ?></td>
                </tr>
            </tfoot>
        </table>
        <a href="<?= base_url('') ?>" class="btn btn-outline-secondary">← Seguir comprando</a>
        <form action="<?= base_url('carrito/comprar') ?>" method="post">
            <?= csrf_field() ?>
            <button type="submit" class="btn btn-success">comprar compra</button>
        </form>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>