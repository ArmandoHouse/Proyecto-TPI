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

<h1>Perfil del Usuario</h1>

<div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" name="nombre" id="nombre" value="<?= esc($usuario['nombre']) ?>" class="form-control" readonly>
</div>
<div class="mb-3">
    <label for="email" class="form-label">Correo Electrónico</label>
    <input type="email" name="email" id="email" value="<?= esc($usuario['email']) ?>" class="form-control" readonly>
</div>
<div class="mb-3">
    <label for="direccion" class="form-label">Dirección</label>
    <input type="text" name="direccion" id="direccion" value="<?= esc($usuario['direccion']) ?>" class="form-control" readonly>
</div>

<?= $this->endSection() ?>
