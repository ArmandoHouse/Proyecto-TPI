<?= $this->extend('layouts/front/plantilla') ?>

<?= $this->section('contenido') ?>
<div class="container py-5">
    <div class="alert alert-danger">
        <h4>Información incompleta</h4>
        <p>
            <?= esc($mensaje) ?><br>
            Por favor, completa los siguientes datos en tu perfil:
            <ul>
                <li>Dirección</li>
                <li>DNI</li>
                <li>Teléfono</li>
            </ul>
        </p>
        <a href="<?= base_url('perfil') ?>" class="btn btn-primary">Ir a Mi Perfil</a>
    </div>
</div>
<?= $this->endSection() ?>