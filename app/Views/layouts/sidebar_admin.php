<style>
/* Ensure the sidebar does not overlap the content */
#sidebarMenu {
    height: 100vh;
    position: fixed;
}

main {
    margin-left: 250px; /* Adjust based on sidebar width */
    padding-top: 20px;
}
</style>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3 sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url('public/admin') ?>">
                            <i class="bi bi-house-door-fill"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('public/admin/usuarios') ?>">
                            <i class="bi bi-people-fill"></i>
                            Usuarios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('public/admin/productos') ?>">
                            <i class="bi bi-box-seam"></i>
                            Productos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('public/admin/categorias') ?>">
                            <i class="bi bi-box-seam"></i>
                            Categorias
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('public/admin/ordenes') ?>">
                            <i class="bi bi-receipt-cutoff"></i>
                            Órdenes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="<?= base_url('public/logout') ?>">
                            <i class="bi bi-box-arrow-right"></i>
                            Cerrar sesión
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <!-- Main content goes here -->
        </main>
    </div>
</div>

