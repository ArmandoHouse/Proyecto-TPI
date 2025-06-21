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
                <a class="nav-link" href="<?= base_url('admin/categorias') ?>">
                    <i class="bi bi-box-seam"></i>
                    Categorias
                </a>
            </li>         
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/consultas') ?>">
                    <i class="bi bi-people-fill"></i>
                    Consultas
                </a>
            </li>     
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/contactos') ?>">
                    <i class="bi bi-people-fill"></i>
                    Contactos
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