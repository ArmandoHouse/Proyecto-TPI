<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    .sidebar {
      height: 100vh;
      position: fixed;
    }
  </style>
</head>
<body>
  <!-- Sidebar -->
  <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= base_url('admin') ?>">
              <i class="bi bi-house-door-fill"></i>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/usuarios') ?>">
              <i class="bi bi-people-fill"></i>
              Usuarios
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/productos') ?>">
              <i class="bi bi-box-seam"></i>
              Productos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/ordenes') ?>">
              <i class="bi bi-receipt-cutoff"></i>
              Órdenes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-danger" href="<?= base_url('logout') ?>">
                <i class="bi bi-box-arrow-right"></i>
                Cerrar sesión
            </a>
          </li>
        </ul>
      </div>
    </nav>

  <?= $this->renderSection('contenido') ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
