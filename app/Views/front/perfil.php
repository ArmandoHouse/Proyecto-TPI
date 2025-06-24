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


<section style="background-color: #eee;">
    <div class="container py-5">
        <h1>Perfil del Usuario</h1>
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Principal</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('perfil') ?>">Mi Perfil</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <form action="<?= base_url('perfil/actualizar') ?>" method="post">
                    <div class="row mb-3">
                        <div class="col-sm-3"><label for="username" class="mb-0">Username</label></div>
                        <div class="col-sm-9">
                            <input type="text" name="username" id="username" class="form-control" value="<?= esc($usuario['username'] ?? '') ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3"><label for="nombre" class="mb-0">Nombre</label></div>
                        <div class="col-sm-9">
                            <input type="text" name="nombre" id="nombre" class="form-control" value="<?= esc($usuario['nombre'] ?? '') ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3"><label for="apellido" class="mb-0">Apellido</label></div>
                        <div class="col-sm-9">
                            <input type="text" name="apellido" id="apellido" class="form-control" value="<?= esc($usuario['apellido'] ?? '') ?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3"><label for="direccion" class="mb-0">Dirección</label></div>
                        <div class="col-sm-9">
                            <input type="text" name="direccion" id="direccion" class="form-control" value="<?= esc($usuario['direccion'] ?? '') ?>">
                        </div>
                    </div>                   
                    <div class="row mb-3">
                        <div class="col-sm-3"><label for="email" class="mb-0">Email</label></div>
                        <div class="col-sm-9">
                            <input type="email" name="email" id="email" class="form-control" value="<?= esc($usuario['email'] ?? '') ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9 offset-sm-3">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<?= $this->endSection() ?>