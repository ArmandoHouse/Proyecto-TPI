<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('titulo') ?>
El Taller - Venta de Hardware
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<div class="container my-5">
    <h1 class="mb-4">Términos y Condiciones</h1>
    <p>Bienvenido a El Taller. Al utilizar nuestro sitio web, aceptás los siguientes términos y condiciones:</p>
    <ul>
      <li>Los precios y disponibilidad de productos están sujetos a cambios sin previo aviso.</li>
      <li>La información personal proporcionada será tratada con confidencialidad según nuestra política de privacidad.</li>
      <li>El Taller no se responsabiliza por daños derivados del mal uso de los productos adquiridos.</li>
      <li>Los tiempos de envío son estimativos y pueden variar por factores externos.</li>
    </ul>
    <p>Recomendamos revisar esta sección periódicamente para estar al tanto de posibles actualizaciones.</p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<?= $this->endSection() ?>