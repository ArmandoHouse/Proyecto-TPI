<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?= base_url('public/assets/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('public/assets/css/styles.css') ?>">
  <title><?= $this->renderSection('titulo')?></title>
  <!-- CSS por sección -->
<?= $this->renderSection('styles') ?>
</head>

<body>
  <?= $this->include('layouts/header')?>
  <?= $this->renderSection('contenido')?>
  <?= $this->include('layouts/footer')?>


  <script src="<?= base_url('public/assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>