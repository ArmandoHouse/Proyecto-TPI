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

<div class="sidebar">
    <h3 class="text-center py-3">Admin Panel</h3>
    <ul class="list-unstyled">
        <li class="nav-item">
            <a class="nav-link text-white d-flex align-items-center" href="<?= base_url('admin/') ?>">
                <i class="bi bi-speedometer2 me-2"></i>
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white d-flex align-items-center" href="<?= base_url('admin/usuarios') ?>">
                <i class="bi bi-people me-2"></i>
                Usuarios
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white d-flex align-items-center" href="<?= base_url('admin/productos') ?>">
                <i class="bi bi-box-seam me-2"></i>
                Productos
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white d-flex align-items-center" href="<?= base_url('admin/pedidos') ?>">
                <i class="bi bi-cart me-2"></i>
                Pedidos
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white d-flex align-items-center" href="<?= base_url('admin/categorias') ?>">
                <i class="bi bi-tags me-2"></i>
                Categorías
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white d-flex align-items-center" href="<?= base_url('admin/contactos') ?>">
                <i class="bi bi-envelope me-2"></i>
                Contactos
            </a>
        </li>
          <li class="nav-item">
            <a class="nav-link text-white d-flex align-items-center" href="<?= base_url('admin/consultas') ?>">
                <i class="bi bi-chat-right-text me-2"></i>
                Consultas
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-danger d-flex align-items-center" href="<?= base_url('logout') ?>">
                <i class="bi bi-box-arrow-right me-2"></i>
                Cerrar sesión
            </a>
        </li>
    </ul>
</div>
