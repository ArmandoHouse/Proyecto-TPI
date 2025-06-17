<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('titulo') ?>
Registro de Usuario
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<?php $errors = session()->getFlashdata('errors') ?? []; ?>

<div class="container mt-5" style="max-width: 500px;">
    <h2 class="mb-4 text-center">Crear Cuenta</h2>
    <form action="<?= base_url('public/registro') ?>" method="post">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control <?= isset($errors['nombre']) ? 'is-invalid' : '' ?>" id="nombre" name="nombre" value="<?= old('nombre') ?>" required>
            <?php if (isset($errors['nombre'])): ?>
                <div class="invalid-feedback"><?= esc($errors['nombre']) ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control <?= isset($errors['apellido']) ? 'is-invalid' : '' ?>" id="apellido" name="apellido" value="<?= old('apellido') ?>" required>
            <?php if (isset($errors['apellido'])): ?>
                <div class="invalid-feedback"><?= esc($errors['apellido']) ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Nombre de usuario</label>
            <input type="text" class="form-control <?= isset($errors['username']) ? 'is-invalid' : '' ?>" id="username" name="username" value="<?= old('username') ?>" required>
            <?php if (isset($errors['username'])): ?>
                <div class="invalid-feedback"><?= esc($errors['username']) ?></div>
            <?php endif; ?>
        </div>
        
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" id="email" name="email" value="<?= old('email') ?>" required>
            <?php if (isset($errors['email'])): ?>
                <div class="invalid-feedback"><?= esc($errors['email']) ?></div>
            <?php endif; ?>
        </div>
        
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>" id="password" name="password" required>
            <?php if (isset($errors['password'])): ?>
                <div class="invalid-feedback"><?= esc($errors['password']) ?></div>
            <?php endif; ?>
        </div>
        
        <div class="mb-3">
            <label for="password_confirm" class="form-label">Confirmar contraseña</label>
            <input type="password" class="form-control <?= isset($errors['password_confirm']) ? 'is-invalid' : '' ?>" id="password_confirm" name="password_confirm" required>
            <?php if (isset($errors['password_confirm'])): ?>
                <div class="invalid-feedback"><?= esc($errors['password_confirm']) ?></div>
            <?php endif; ?>
        </div>
        
        <button type="submit" class="btn btn-primary w-100">Registrarse</button>
    </form>
    <p class="mt-3 text-center">¿Ya tienes una cuenta? <a href="<?= base_url('public/login') ?>">Iniciar sesión</a></p>
</div>

<?= $this->endSection() ?>
