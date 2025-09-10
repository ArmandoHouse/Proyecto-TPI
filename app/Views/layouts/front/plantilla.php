<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= $this->renderSection('titulo') ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">



  <link rel="stylesheet" href="<?= base_url('assets/css/views/layouts/header.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/views/layouts/marcas.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/views/layouts/footer.css') ?>">

  <title><?= $this->renderSection('titulo') ?></title>

  <?= $this->renderSection('styles') ?>
</head>

<body>

  <?= $this->include('layouts/front/header') ?>
  <?= $this->renderSection('contenido') ?>

  <?= $this->include('layouts/front/marcas') ?>
  <?= $this->include('layouts/front/footer') ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    (function() {
      const form = document.querySelector('form[role="search"]');
      if (form) {
        form.addEventListener('submit', function(e) {
          // Replace with your CI4 search route
          // e.preventDefault();
        });
      }
      const cart = document.querySelector('.cart-badge');
      if (cart) {
        cart.dataset.count = cart.textContent;
      }
    })();
  </script>
</body>

</html>