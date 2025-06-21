<?= $this->extend('layouts/front/plantilla') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/views/contacto.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<div class="container">
    <form action="<?= base_url('contacto/enviar') ?>" method="post">
        <div class="mb-3">
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Teléfono (opcional):</label>
            <input type="text" name="telefono" class="form-control">
        </div>
        <div class="mb-3">
            <label>Asunto:</label>
            <input type="text" name="asunto" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Mensaje:</label>
            <textarea name="mensaje" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>



<?= $this->endSection() ?>