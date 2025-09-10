<?= $this->extend('layouts/back/plantilla_admin') ?>



<?= $this->section('contenido') ?>
<style>
    .img-producto-tabla {
        width: 80px;
        height: 80px;
        object-fit: contain;
    }
</style>

<div class="container my-4">
    <h2>Detalle del Pedido #<?= $pedido['id'] ?></h2>
    <div class="row mb-4">
        <div class="col-md-6">
            <h5>Información del pedido</h5>
            <p><strong>Fecha:</strong> <?= date('d/m/Y H:i', strtotime($pedido['created_at'])) ?></p>
            <form method="post" action="<?= base_url('admin/pedidos/editar/' . $pedido['id']) ?>">
                <label for="estado"><strong>Estado:</strong></label>
                <select name="estado" id="estado" class="form-select d-inline-block w-auto">
                    <?php foreach ($estados as $estado): ?>
                        <option value="<?= $estado ?>" <?= $pedido['estado'] === $estado ? 'selected' : '' ?>><?= ucfirst($estado) ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" class="btn btn-sm btn-primary ms-2">Actualizar</butto n>
            </form>
        </div>
        <div class="col-md-6">
            <h5>Información del cliente</h5>
            <p><strong>Nombre:</strong> <?= esc($usuario['nombre']) . ' ' . esc($usuario['apellido']) ?></p>
            <p><strong>Email:</strong> <?= esc($usuario['email']) ?></p>
            <p><strong>Teléfono:</strong> <?= esc($usuario['telefono'] ?? '-') ?></p>
            <p><strong>DNI:</strong> <?= esc($usuario['dni'] ?? '-') ?></p>
            <p><strong>Domicilio de entrega:</strong> <?= esc($pedido['direccion_envio'] ?? '-') ?></p>
        </div>
    </div>
    <h5>Productos del pedido</h5>
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio unitario</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>
                <?php foreach ($items as $item): ?>
                    <?php $subtotal = $item['precio_unitario'] * $item['cantidad'];
                    $total += $subtotal; ?>
                    <tr>
                        <td  style="width: 100px;">
                            <?php if (!empty($item['imagen'])): ?>
                            <img src="<?= base_url('assets/img/' . $item['imagen']) ?>" alt="" class="img-producto-tabla"> <?php endif; ?>
                        </td>                        
                        <td><?= esc($item['nombre']) ?></td>
                        <td><?= $item['cantidad'] ?></td>
                        <td>$<?= number_format($item['precio_unitario'], 2, ',', '.') ?></td>
                        <td>$<?= number_format($subtotal, 2, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-end fw-bold fs-5">Total: $<?= number_format($total, 2, ',', '.') ?></div>
    </div>
</div>



<?= $this->endSection() ?>