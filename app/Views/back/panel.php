<?= $this->extend('layouts/back/plantilla_admin') ?>

<?= $this->section('contenido') ?>

<div class="container-fluid">
  <div class="row">    

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Panel de Administración</h1>
      </div>

      <!-- <h4>Bienvenido, <?= session('username') ?></h4>
      
      Estadísticas rápidas
      <div class="row">
        <div class="col-md-4">
          <div class="card text-white bg-primary mb-3">
            <div class="card-body">
              <h5 class="card-title">Usuarios</h5>
              <p class="card-text">54 registrados</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card text-white bg-success mb-3">
            <div class="card-body">
              <h5 class="card-title">Productos</h5>
              <p class="card-text">128 en stock</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card text-white bg-warning mb-3">
            <div class="card-body">
              <h5 class="card-title">Órdenes</h5>
              <p class="card-text">23 pendientes</p>
            </div>
          </div>
        </div>
      </div>
            
      <h5 class="mt-4">Últimos Usuarios Registrados</h5>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Email</th>
              <th>Rol</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Juan Pérez</td>
              <td>juan@example.com</td>
              <td>Admin</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Ana Torres</td>
              <td>ana@example.com</td>
              <td>Usuario</td>
            </tr>
          </tbody>
        </table>
      </div>
    </main> -->
  </div>
</div>

<?= $this->endSection() ?>
