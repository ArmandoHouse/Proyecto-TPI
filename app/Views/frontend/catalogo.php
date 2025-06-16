<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('public/assets/css/views/catalogo.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<div class="container">
    <h1><?= esc($nombreCategoria) ?></h1>
</div>

<div class="container my-4">
    <div class="row">
        <?php foreach ($productos as $producto): ?>
            <div class="col-md-4 mb-4">
                <a href="<?= base_url('public/catalogo/ver_producto/' . $producto['id']) ?>" class="text-decoration-none text-dark" style="display:block;">
                    <div class="card h-100">
                        <?php if (!empty($producto['imagen'])): ?>
                            <img src="<?= base_url('public/assets/img/card.jpg') ?>" class="card-img-top" alt="<?= esc($producto['nombre']) ?>">
                        <?php else: ?>
                            <img src="<?= base_url('public/assets/img/card.jpg') ?>" class="card-img-top" alt="Sin imagen">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($producto['nombre']) ?></h5>
                            <p class="card-text">$<?= number_format($producto['precio'], 2, ',', '.') ?></p>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
        <?php if (empty($productos)): ?>
            <div class="col-12">
                <div class="alert alert-info text-center">No hay productos en esta categoría.</div>
            </div>
        <?php endif; ?>
    </div>
</div>


<?= $this->endSection() ?>