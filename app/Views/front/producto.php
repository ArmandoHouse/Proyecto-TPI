<?= $this->extend('layouts/front/plantilla') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/views/principal.css') ?>">
<style>

</style>

<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
<div class="container py-5">

  <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?= session()->getFlashdata('error') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
    </div>
  <?php endif; ?>

  <div class="row">
    <div class="col-md-6">
      <?php if (!empty($producto['imagen'])): ?>
        <img src="<?= base_url('assets/img/' . $producto['imagen']) ?>" class="card-img-top" alt="<?= esc($producto['nombre']) ?>">
      <?php else: ?>
        <img src="<?= base_url('assets/img/sin-imagen.png') ?>" class="card-img-top" alt="Sin imagen">
      <?php endif; ?>
    </div>
    <div class="col-md-6">
      <h2><?= esc($producto['nombre']) ?></h2>
      <p class="text-muted"><?= esc($producto['descripcion']) ?></p>
      <h4 class="text-primary">$<?= number_format($producto['precio'], 0, ',', '.') ?></h4>

      <div class="mt-4">
        <div class="d-flex align-items-end flex-wrap gap-2">
          <!-- Input de cantidad fuera de los formularios -->
          <div>
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" value="1" min="1" max="<?= esc($producto['stock']) ?>" class="form-control" style="width: 100px;">
          </div>

          <!-- Formulario para agregar al carrito -->
          <form action="<?= base_url('carrito/agregar/' . $producto['id']) ?>" method="post" class="form-agregar-carrito">
            <?= csrf_field() ?>
            <input type="hidden" name="cantidad" id="cantidad_carrito" value="1">
            <input type="hidden" name="redirect_to" value="<?= current_url() ?>">
            <button type="submit" class="btn btn-primary">Agregar al carrito</button>
          </form>

          <!-- Formulario para comprar ahora -->
          <form action="<?= base_url('pedidos/generar/' . $producto['id']) ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="cantidad" id="cantidad_comprar" value="1">
            <button type="submit" class="btn btn-success">Comprar ahora</button>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- Toast container -->
<div aria-live="polite" aria-atomic="true" class="position-fixed top-0 end-0 p-3" style="z-index: 1080;">
  <div id="toastCarrito" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body" id="toastCarritoMsg">
        Producto agregado al carrito.
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Cerrar"></button>
    </div>
  </div>
</div>


<script>
  function validarCantidad(e) {
    const cantidad = parseInt(document.getElementById('cantidad').value, 10);
    if (isNaN(cantidad) || cantidad < 1) {
      e.preventDefault();
      alert('La cantidad debe ser mayor o igual a 1.');
      return false;
    }
    return true;
  }

  // Al enviar el formulario de agregar al carrito
  document.querySelector('form[action*="carrito/agregar"]').addEventListener('submit', function(e) {
    if (!validarCantidad(e)) return;
    const cantidad = document.getElementById('cantidad').value;
    document.getElementById('cantidad_carrito').value = cantidad;
  });

  // Al enviar el formulario de comprar ahora
  document.querySelector('form[action*="pedidos/generar"]').addEventListener('submit', function(e) {
    if (!validarCantidad(e)) return;
    const cantidad = document.getElementById('cantidad').value;
    document.getElementById('cantidad_comprar').value = cantidad;
  });
</script>


<script>
document.querySelectorAll('.form-agregar-carrito').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(form);
        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            let msg = 'Producto agregado al carrito.';
            let toastEl = document.getElementById('toastCarrito');
            // Remueve ambas clases antes de agregar la correcta
            toastEl.classList.remove('text-bg-success', 'text-bg-danger');
            if (data && data.success) {
                msg = data.success;
                toastEl.classList.add('text-bg-success');
            } else if (data && data.error) {
                msg = data.error;
                toastEl.classList.add('text-bg-danger');
            }
            document.getElementById('toastCarritoMsg').textContent = msg;
            const toast = new bootstrap.Toast(toastEl);
            toast.show();
        })
        .catch(() => {
            let toastEl = document.getElementById('toastCarrito');
            toastEl.classList.remove('text-bg-success');
            toastEl.classList.add('text-bg-danger');
            document.getElementById('toastCarritoMsg').textContent = 'Ocurrió un error.';
            const toast = new bootstrap.Toast(toastEl);
            toast.show();
        });
    });
});
</script>

<?= $this->endSection() ?>