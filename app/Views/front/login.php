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


<div class="container mt-5" style="max-width: 500px;">
    <h2 class="mb-4 text-center">Iniciar Sesión</h2>
    <form action="<?= base_url('login') ?>" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        
        <button type="submit" class="btn btn-success w-100">Entrar</button>
    </form>
    <p class="mt-3 text-center">¿No tienes cuenta? <a href="<?= base_url('registro') ?>">Regístrate</a></p>
</div>
<?= $this->endSection() ?>
