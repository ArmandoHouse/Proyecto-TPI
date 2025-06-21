<?= $this->extend('layouts/front/plantilla') ?>

<?= $this->section('titulo') ?>
Inicio de Sesión
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<?php if (session()->getFlashdata('mensaje')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('mensaje') ?>
    </div>
<?php elseif (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>


<?= $this->endSection() ?>
