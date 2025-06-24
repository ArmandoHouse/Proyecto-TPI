<?= $this->extend('layouts/front/plantilla') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/views/principal.css') ?>">

<style>
    .card-producto {
        border-radius: 16px;
        transition: box-shadow 0.2s, transform 0.2s;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
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
                    <option value="">Más relevantes</option>
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
            <div class="card p-3">
                <form method="get">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= esc($_GET['nombre'] ?? '') ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Rango de precio</label>
                        <div class="d-flex gap-2">
                            <input type="number" class="form-control" name="precio_min" placeholder="Mín" min="0" value="<?= esc($_GET['precio_min'] ?? '') ?>">
                            <input type="number" class="form-control" name="precio_max" placeholder="Máx" min="0" value="<?= esc($_GET['precio_max'] ?? '') ?>">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Filtrar</button>
                </form>
            </div>
        </div>

        <!-- Productos -->
        <div class="col-md-9">
            <div class="row">
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
                                        <form action="<?= base_url('carrito/agregar/' . $producto['id']) ?>" method="post" class="mt-auto">
                                            <button type="submit" class="btn btn-success w-100 mb-2">Agregar al carrito</button>
                                        </form>
                                        <div class="text-center fw-bold fs-5 text-primary">
                                            $<?= number_format($producto['precio'], 2, ',', '.') ?>
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





<?= $this->endSection() ?>