<?= $this->extend('layouts/plantilla') ?>

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


<div class="container py-5">
    <h1 class="text-center mb-4">Cargar nuevo producto</h1>

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <form action="<?= base_url('public/admin/guardar-producto')?>"  method="post" enctype="multipart/form-data" class="p-4 border rounded shadow-sm bg-light">

                <div class="mb-3">
                    <label class="form-label">Nombre:</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Descripción:</label>
                    <input type="text" name="descripcion" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Imagen:</label>
                    <input type="file" name="imagen" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Categoría:</label>
                    <select name="categoria_id" class="form-select" required>
                        <option value="">Seleccione una categoría</option>
                        <?php foreach ($categorias as $categoria): ?>
                            <option value="<?= esc($categoria['id']) ?>"><?= esc($categoria['nombre']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Precio:</label>
                    <input type="number" name="precio" step="0.01" class="form-control" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
