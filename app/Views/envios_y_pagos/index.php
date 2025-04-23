<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('titulo') ?>
El Taller - Venta de Hardware
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<div class="container my-5">
    <h1 class="mb-4">Envíos y Pagos</h1>
    <p>En esta sección encontrarás toda la información necesaria sobre nuestras modalidades de envío y formas de pago disponibles.</p>

    <h3>Formas de Envío</h3>
    <ul>
      <li>Envío estándar (3 a 7 días hábiles)</li>
      <li>Envío exprés (1 a 2 días hábiles)</li>
      <li>Retiro en local (sin costo adicional)</li>
    </ul>

    <h3>Formas de Pago</h3>
    <ul>
      <li>Tarjeta de crédito y débito (Visa, Mastercard, etc.)</li>
      <li>Transferencia bancaria</li>
      <li>Pago contra entrega (solo en ciertas zonas)</li>
      <li>Mercado Pago</li>
    </ul>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<?= $this->endSection() ?>