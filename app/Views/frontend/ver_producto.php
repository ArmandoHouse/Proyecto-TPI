<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('public/assets/css/views/quienes_somos.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<h1>Detalles del producto <?php echo $producto['nombre'] ?></h1>

<?= $this->endSection() ?>