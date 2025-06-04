<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('contenido') ?>
<h1>Cargar nuevo producto</h1>

<form action="/admin/guardar-producto" method="post" enctype="multipart/form-data">
    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br><br>

    <label>Descripcion:</label><br>
    <input type="text" name="nombre" required><br><br>

    <label>Imagen:</label><br>
    <input type="file" name="imagen" required><br><br>

    <label>Categoría:</label><br>
    <select name="categoria_id" required>
        <option value="">Seleccione una categoría</option>
        <?php foreach ($categorias as $categoria): ?>
            <option value="<?= esc($categoria['id']) ?>"><?= esc($categoria['nombre']) ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Precio:</label><br>
    <input type="number" name="precio" step="0.01" required><br><br>

    <label>Precio:</label><br>
    <input type="number" name="precio" step="0.01" required><br><br>

    <button type="submit">Guardar</button>
</form>
<?= $this->endSection() ?>
