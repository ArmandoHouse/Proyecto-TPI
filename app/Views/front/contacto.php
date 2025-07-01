<?= $this->extend('layouts/front/plantilla') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/views/contacto.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<div class="container">
    <form action="<?= base_url('contacto/enviar') ?>" method="post" autocomplete="on">
        <div class="row mb-3">
            <div class="col-sm-3"><label for="nombre" class="mb-0">Nombre</label></div>
            <input type="text" name="nombre" id="nombre" class="form-control"
                value="<?= esc($usuario['nombre'] ?? '') ?>" required autocomplete="name">
        </div>
        <div class="row mb-3">
            <div class="col-sm-3"><label for="email" class="mb-0">Email</label></div>
            <input type="email" name="email" id="email" class="form-control" value="<?= esc($usuario['email'] ?? '') ?>" required autocomplete="email">
        </div>
        <div class="row mb-3">
            <div class="col-sm-3"><label for="telefono" class="mb-0">Teléfono</label></div>
            <input type="text" name="telefono" id="telefono" class="form-control"
                value="<?= esc($usuario['telefono'] ?? '') ?>" autocomplete="tel">
        </div>
        <div class="row mb-3">
            <div class="col-sm-3"><label for="asunto" class="mb-0">Asunto</label></div>
            <input type="text" name="asunto" id="asunto" class="form-control" required autocomplete="off">
        </div>
        <div class="row mb-3">
            <div class="col-sm-3"><label for="mensaje" class="mb-0">Descripción</label></div>
            <textarea name="mensaje" id="mensaje" class="form-control" rows="5" required autocomplete="off"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>

<?= $this->endSection() ?>