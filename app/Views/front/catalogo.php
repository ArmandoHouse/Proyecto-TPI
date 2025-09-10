<?= $this->extend('layouts/front/plantilla') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/views/principal.css') ?>">

<style>
    .card-producto {
        border-radius: 16px;
        transition: box-shadow 0.2s, transform 0.2s;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        height: 100%;
        /* Asegura que llene el alto del contenedor */
        display: flex;
        flex-direction: column;
    }

    .card-producto img {
        object-fit: contain;
        height: 200px;
        border-top-left-radius: 16px;
        border-top-right-radius: 16px;
    }

    .card-producto .card-body {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .card-producto:hover {
        box-shadow: 0 6px 24px rgba(0, 0, 0, 0.15);
        transform: translateY(-4px) scale(1.03);
    }

    .custom-pagination .page-circle {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        text-decoration: none;
        color: #000;
        font-size: 14px;
        transition: background 0.3s, color 0.3s;
    }

    .custom-pagination .page-circle:hover {
        background: #e0e0e0;
    }

    .custom-pagination .page-circle.active {
        background: #333;
        color: #fff;
        font-weight: bold;
    }

    .custom-pagination .todo-btn {
        border-radius: 0;
        font-weight: normal;
        width: auto;
        height: auto;
    }

    .filtro-producto {
        border-radius: 16px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        transition: box-shadow 0.3s ease;
    }

    .filtro-producto:hover {
        box-shadow: 0 6px 24px rgba(0, 0, 0, 0.15);
        /* No uses transform aquí */
    }
</style>

<?= $this->endSection() ?>

<?= $this->section('contenido') ?>
<div class="container my-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('principal') ?>">Principal</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= esc($nombreCategoria) ?></li>
        </ol>
    </nav>

    <!-- Nombre de la categoría y dropdown de orden -->
    <div class="d-flex justify-content-between align-items-start mb-4">
        <h2 class="mb-0"><?= esc($nombreCategoria) ?></h2>
        <div class="d-flex flex-column align-items-end" style="min-width:220px;">
            <!-- Dropdown de orden -->
            <form method="get" class="mb-2" style="min-width:200px;">
                <input type="hidden" name="nombre" value="<?= esc($_GET['nombre'] ?? '') ?>">
                <input type="hidden" name="precio_min" value="<?= esc($_GET['precio_min'] ?? '') ?>">
                <input type="hidden" name="precio_max" value="<?= esc($_GET['precio_max'] ?? '') ?>">
                <label for="orden" class="me-2 mb-0 fw-bold">Ordenar por</label>
                <select name="orden" id="orden" class="form-select d-inline-block w-auto" style="display:inline-block;" onchange="this.form.submit()">
                    <option value="precio_asc" <?= (($_GET['orden'] ?? '') === 'precio_asc') ? 'selected' : '' ?>>Menor precio</option>
                    <option value="precio_desc" <?= (($_GET['orden'] ?? '') === 'precio_desc') ? 'selected' : '' ?>>Mayor precio</option>
                </select>
            </form>
            <!-- Paginación -->
            <?php if (isset($totalPaginas) && $totalPaginas > 1): ?>
                <div class="custom-pagination d-flex align-items-center gap-3">
                    <?php for ($p = 1; $p <= $totalPaginas; $p++): ?>
                        <a href="<?= current_url() . '?' . http_build_query(array_merge($_GET, ['pagina' => $p])) ?>"
                            class="page-circle <?= ($paginaActual ?? 1) == $p ? 'active' : '' ?>">
                            <?= $p ?>
                        </a>
                    <?php endfor; ?>
                    <a href="<?= current_url() . '?' . http_build_query(array_merge($_GET, ['pagina' => 'todo'])) ?>" class="page-circle todo-btn">
                        TODO
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <!-- Filtros -->
        <div class="col-md-3 mb-4">
            <div class="card filtro-producto p-3">
                <form method="get">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= esc($_GET['nombre'] ?? '') ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Rango de precio</label>
                        <div class="d-flex gap-2">
                            <input type="text" class="form-control" name="precio_min" placeholder="Mín" value="<?= esc($_GET['precio_min'] ?? '') ?>">
                            <input type="text" class="form-control" name="precio_max" placeholder="Máx" value="<?= esc($_GET['precio_max'] ?? '') ?>">

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Filtrar</button>
                </form>
            </div>
        </div>

        <!-- Productos -->
        <div class="col-md-9">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                <?php if (!empty($productos)): ?>
                    <?php foreach ($productos as $i => $producto): ?>
                        <div class="col-md-4 mb-4">
                            <a href="<?= base_url('catalogo/ver_producto/' . $producto['id']) ?>" class="text-decoration-none text-dark" style="display:block;">
                                <div class="card card-producto h-100">
                                    <?php if (!empty($producto['imagen'])): ?>
                                        <img src="<?= base_url('assets/img/' . $producto['imagen']) ?>" class="card-img-top" alt="<?= esc($producto['nombre']) ?>">
                                    <?php else: ?>
                                        <img src="<?= base_url('assets/img/sin-imagen.png') ?>" class="card-img-top" alt="Sin imagen">
                                    <?php endif; ?>
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title"><?= esc($producto['nombre']) ?></h5>
                                        <div class="text-center fw-bold fs-5 text-primary">
                                            $<?= number_format($producto['precio'], 2, ',', '.') ?>
                                            <form action="<?= base_url('carrito/agregar/' . $producto['id']) ?>" method="post" class="form-agregar-carrito">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="redirect_to" value="<?= current_url() ?>">
                                                <button type="submit" class="btn btn-success w-100 mb-2">Agregar al carrito</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php if (($i + 1) % 3 == 0): ?>
                            <div class="w-100"></div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12">
                        <div class="alert alert-info text-center">No hay productos en esta categoría.</div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<!-- Toast container -->
<div aria-live="polite" aria-atomic="true" class="position-fixed top-0 end-0 p-3" style="z-index: 1080;">
    <div id="toastCarrito" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body" id="toastCarritoMsg">
                Producto agregado al carrito.
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Cerrar"></button>
        </div>
    </div>
</div>

<script>
document.querySelectorAll('.form-agregar-carrito').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(form);
        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            let msg = 'Producto agregado al carrito.';
            let toastEl = document.getElementById('toastCarrito');
            // Remueve ambas clases antes de agregar la correcta
            toastEl.classList.remove('text-bg-success', 'text-bg-danger');
            if (data && data.success) {
                msg = data.success;
                toastEl.classList.add('text-bg-success');
            } else if (data && data.error) {
                msg = data.error;
                toastEl.classList.add('text-bg-danger');
            }
            document.getElementById('toastCarritoMsg').textContent = msg;
            const toast = new bootstrap.Toast(toastEl);
            toast.show();
        })
        .catch(() => {
            let toastEl = document.getElementById('toastCarrito');
            toastEl.classList.remove('text-bg-success');
            toastEl.classList.add('text-bg-danger');
            document.getElementById('toastCarritoMsg').textContent = 'Ocurrió un error.';
            const toast = new bootstrap.Toast(toastEl);
            toast.show();
        });
    });
});
</script>

<?= $this->endSection() ?>