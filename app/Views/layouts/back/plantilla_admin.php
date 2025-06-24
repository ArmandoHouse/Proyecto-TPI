<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>

  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/css/views/layouts/sidebar_admin.css') ?>">

  <style>
    .sidebar {
      width: 250px;
      background-color: #343a40;
      color: #fff;
      position: fixed;
      height: 100%;
      padding-top: 20px;
    }

    .sidebar a {
      color: #fff;
      text-decoration: none;
      padding: 10px 15px;
      display: block;
    }

    .sidebar a:hover {
      background-color: #495057;
    }

    .main-content {
      margin-left: 250px;
      padding: 20px;
    }
  </style>

  <?= $this->renderSection('styles') ?>
</head>

<body class="d-flex flex-column min-vh-100">

  <?= $this->include('layouts/back/sidebar_admin') ?>
  <main class="main-content flex-fill">
    <?= $this->renderSection('contenido') ?>
  </main>
  <?= $this->renderSection('scripts') ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>