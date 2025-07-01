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
    <!-- Filtros -->
    <form method="get" class="row g-3 mb-4">
        <div class="col-md-4">
            <input type="text" name="cliente" value="<?= esc($filtros['cliente'] ?? '') ?>" class="form-control" placeholder="Buscar por cliente...">
        </div>
        <div class="col-md-3">
            <select name="estado" class="form-select">
                <option value="">Todos</option>
                <option value="pendiente" <?= (isset($filtros['estado']) && $filtros['estado'] === 'pendiente') ? 'selected' : '' ?>>Pendiente</option>
                <option value="cancelado" <?= (isset($filtros['estado']) && $filtros['estado'] === 'cancelado') ? 'selected' : '' ?>>Cancelado</option>
                <option value="confirmado" <?= (isset($filtros['estado']) && $filtros['estado'] === 'confirmado') ? 'selected' : '' ?>>Confirmado</option>
                <option value="enviado" <?= (isset($filtros['estado']) && $filtros['estado'] === 'enviado') ? 'selected' : '' ?>>Enviado</option>
                <option value="entregado" <?= (isset($filtros['estado']) && $filtros['estado'] === 'entregado') ? 'selected' : '' ?>>Entregado</option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Filtrar</button>
        </div>
    </form>

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
            <?php if (!empty($pedidos)): ?>
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
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">No se encontraron productos.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>