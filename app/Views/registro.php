<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('titulo') ?>
Registro de Usuario
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
<div class="container mt-5" style="max-width: 500px;">
    <h2 class="mb-4 text-center">Crear Cuenta</h2>
    <form action="<?= base_url('auth/register') ?>" method="post">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" required>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Nombre de usuario</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        
        <div class="mb-3">
            <label for="password_confirm" class="form-label">Confirmar contraseña</label>
            <input type="password" class="form-control" id="password_confirm" name="password_confirm" required>
        </div>
        
        <button type="submit" class="btn btn-primary w-100">Registrarse</button>
    </form>
    <p class="mt-3 text-center">¿Ya tienes una cuenta? <a href="<?= base_url('public/login') ?>">Iniciar sesión</a></p>
</div>
<?= $this->endSection() ?>
