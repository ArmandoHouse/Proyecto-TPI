<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="<?= base_url('public/assets/css/bootstrap.min.css') ?>">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">


  <!-- CSS fijos para header, marcas y footer -->
  <link rel="stylesheet" href="<?= base_url('public/assets/css/views/layouts/header.css') ?>">
  <link rel="stylesheet" href="<?= base_url('public/assets/css/views/layouts/marcas.css') ?>">
  <link rel="stylesheet" href="<?= base_url('public/assets/css/views/layouts/footer.css') ?>">

  <title><?= $this->renderSection('titulo') ?></title>
  
  <!-- CSS por sección -->
  <?= $this->renderSection('styles') ?>
</head>

<body>
  <?= $this->include('layouts/header') ?>
  <?= $this->renderSection('contenido') ?>
  <?= $this->include('layouts/marcas') ?>
  <?= $this->include('layouts/footer') ?>
  <?= $this->renderSection('scripts') ?>

  <script src="<?= base_url('public/assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>