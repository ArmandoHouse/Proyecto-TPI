<?= $this->extend('layouts/back/plantilla_admin') ?>

<?= $this->section('contenido') ?>

<div class="container-fluid">
  <div class="row">

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Panel de Administración</h1>
      </div>

      <h4>Bienvenido, <?= session('username') ?></h4>

      <div class="container my-4">
        <div class="row g-4">
          <div class="col-md-4">
            <a href="<?= base_url('admin/usuarios') ?>" class="text-decoration-none">
              <div class="card shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                  <div class="bg-light rounded-circle p-3 me-3">
                    <i class="bi bi-people fs-2 text-primary"></i>
                  </div>
                  <div>
                    <div class="text-muted">Usuarios</div>
                    <div class="fs-3 fw-bold"><?= $usuarios ?></div>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-4">
            <a href="<?= base_url('admin/productos') ?>" class="text-decoration-none">
              <div class="card shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                  <div class="bg-light rounded-circle p-3 me-3">
                    <i class="bi bi-box-seam fs-2 text-success"></i>
                  </div>
                  <div>
                    <div class="text-muted">Productos</div>
                    <div class="fs-3 fw-bold"><?= $productos ?></div>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-4">
            <a href="<?= base_url('admin/pedidos') ?>" class="text-decoration-none">
              <div class="card shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                  <div class="bg-light rounded-circle p-3 me-3">
                    <i class="bi bi-bag-check fs-2 text-warning"></i>
                  </div>
                  <div>
                    <div class="text-muted">Pedidos</div>
                    <div class="fs-3 fw-bold"><?= $pedidos ?></div>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-4">
            <a href="<?= base_url('admin/categorias') ?>" class="text-decoration-none">
              <div class="card shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                  <div class="bg-light rounded-circle p-3 me-3">
                    <i class="bi bi-tags fs-2 text-info"></i>
                  </div>
                  <div>
                    <div class="text-muted">Categorías</div>
                    <div class="fs-3 fw-bold"><?= $categorias ?></div>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-4">
            <a href="<?= base_url('admin/consultas') ?>" class="text-decoration-none">
              <div class="card shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                  <div class="bg-light rounded-circle p-3 me-3">
                    <i class="bi bi-chat-dots fs-2 text-secondary"></i>
                  </div>
                  <div>
                    <div class="text-muted">Consultas</div>
                    <div class="fs-3 fw-bold"><?= $consultas ?></div>
                  </div>
                </div>
              </div>
            </a>
          </div>         
          <div class="col-md-4">
            <a href="<?= base_url('admin/contactos') ?>" class="text-decoration-none">
              <div class="card shadow-sm h-100">
                <div class="card-body d-flex align-items-center">
                  <div class="bg-light rounded-circle p-3 me-3">
                    <i class="bi bi-chat-dots fs-2 text-secondary"></i>
                  </div>
                  <div>
                    <div class="text-muted">Contactos</div>
                    <div class="fs-3 fw-bold"><?= $contactos ?></div>
                  </div>
                </div>
              </div>
            </a>
          </div>         
        </div>
      </div>
  </div>

  <?= $this->endSection() ?>