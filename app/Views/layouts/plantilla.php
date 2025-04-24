<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?= base_url('public/assets/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('public/assets/css/productos/index.css') ?>" rel="stylesheet">
  <link href="<?= base_url('public/assets/css/inicio/inicio.css') ?>" rel="stylesheet">
  <title><?= $this->renderSection('titulo')?></title>
</head>

<body>
  <?= $this->include('layouts/header')?>
  <?= $this->renderSection('contenido')?>
  <?= $this->include('layouts/footer')?>


  <script src="<?= base_url('public/assets/js/bootstrap.bundle.min.js') ?>"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>