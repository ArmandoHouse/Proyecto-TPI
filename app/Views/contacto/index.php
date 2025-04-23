<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('titulo') ?>
El Taller - Venta de Hardware
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<div class="container my-5">
    <h1 class="mb-4">Contacto</h1>
    <p>Podés comunicarte con nosotros a través de los siguientes medios:</p>
    <ul>
      <li>📧 Correo: <a href="mailto:contacto@eltaller.com">contacto@eltaller.com</a></li>
      <li>📱 Instagram: <a href="https://instagram.com/eltallerhw" target="_blank">@eltallerhw</a></li>
      <li>📞 Teléfono: (123) 456-7890</li>
    </ul>

    <h3 class="mt-4">Formulario de Contacto</h3>
    <form>
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" placeholder="Tu nombre">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Correo electrónico</label>
        <input type="email" class="form-control" id="email" placeholder="nombre@ejemplo.com">
      </div>
      <div class="mb-3">
        <label for="mensaje" class="form-label">Mensaje</label>
        <textarea class="form-control" id="mensaje" rows="4" placeholder="Escribí tu consulta..."></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<?= $this->endSection() ?>