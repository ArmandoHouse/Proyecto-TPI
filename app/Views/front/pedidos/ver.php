<?= $this->extend('layouts/front/plantilla') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/views/front/pedidos/ver.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<body class="bg-light">
    <div class="container-fluid py-4">
        <div class="container">
            <!-- Header con botones de acción -->
            <div class="row mb-4">
                <div class="col-md-8">
                    <h1 class="display-5 fw-bold text-dark mb-2">
                        Detalle de Facturación
                    </h1>
                    <p class="text-muted">Gestión de facturas</p>
                </div>
                <div class="col-md-4">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button
                            id="printBtn"
                            class="btn btn-primary btn-lg shadow-sm"
                            type="button">
                            <i class="bi bi-printer me-2"></i>
                            Imprimir Factura
                        </button>
                        <button
                            id="continueBtn"
                            class="btn btn-outline-primary btn-lg"
                            type="button">
                            <i class="bi bi-cart-plus me-2"></i>
                            Continuar Comprando
                        </button>
                    </div>
                </div>
            </div>

            <!-- Tarjeta de factura -->
            <div class="card shadow-lg border-0">
                <!-- Cabecera de la factura -->
                <div class="card-header invoice-header text-white p-4">
                    <div class="row align-items-start">
                        <div class="col-lg-8">
                            <div class="d-flex align-items-center">
                                <div class="company-icon me-3">
                                    <i class="bi bi-building display-4"></i>
                                </div>
                                <div>
                                    <h2 class="h1 fw-bold mb-2">ZonaHardware</h2>
                                    <p class="mb-1 opacity-75">Proveedor de Tecnología e Innovación</p>
                                    <p class="mb-0 small opacity-75">CUIT: 20-12345678-9</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                            <div class="invoice-details-card p-3 rounded">
                                <p class="small mb-1 opacity-75">Número de Factura</p>
                                <p class="h4 fw-bold mb-3" id="invoiceNumber"></p>
                                <p class="small mb-1 opacity-75">Fecha de Emisión</p>
                                <p class="fw-semibold mb-0" id="invoiceDate"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Información del cliente -->
                <div class="card-body bg-light">
                    <div class="mb-3">
                        <h5 class="card-title d-flex align-items-center">
                            <i class="bi bi-person-circle me-2 text-primary"></i>
                            Información del Cliente
                        </h5>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person me-2 text-muted"></i>
                                    <div>
                                        <small class="text-muted">Nombre</small>
                                        <p class="mb-0 fw-semibold" id="clientName"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-envelope me-2 text-muted"></i>
                                    <div>
                                        <small class="text-muted">Email</small>
                                        <p class="mb-0 fw-semibold" id="clientEmail"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-credit-card me-2 text-muted"></i>
                                    <div>
                                        <small class="text-muted">DNI</small>
                                        <p class="mb-0 fw-semibold" id="clientDni"></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-telephone me-2 text-muted"></i>
                                    <div>
                                        <small class="text-muted">Teléfono</small>
                                        <p class="mb-0 fw-semibold" id="clientPhone"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="d-flex align-items-start">
                                    <i class="bi bi-geo-alt me-2 text-muted mt-1"></i>
                                    <div>
                                        <small class="text-muted">Dirección</small>
                                        <p class="mb-0 fw-semibold" id="clientAddress"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="m-0" />

                <!-- Detalle de productos -->
                <div class="card-body">
                    <h5 class="card-title mb-4">Detalle de Productos</h5>

                    <!-- Tabla para desktop -->
                    <div class="d-none d-md-block">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" class="fw-semibold">Producto</th>
                                        <th scope="col" class="text-center fw-semibold">
                                            Cantidad
                                        </th>
                                        <th scope="col" class="text-end fw-semibold">
                                            Precio Unit.
                                        </th>
                                        <th scope="col" class="text-end fw-semibold">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody id="productsTableBody">
                                    <!-- Los productos se llenarán con JavaScript -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Cards para mobile -->
                    <div class="d-md-none" id="productsMobile">
                        <!-- Los productos se llenarán con JavaScript -->
                    </div>
                </div>

                <hr class="m-0" />

                <!-- Sección de totales -->
                <div class="card-body bg-light">
                    <div class="row justify-content-end">
                        <div class="col-md-6 col-lg-4">
                            <div class="card border-0 bg-white shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-muted">Subtotal</span>
                                        <span class="fw-semibold" id="subtotalAmount">$0.00</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-muted">IVA (21%)</span>
                                        <span class="fw-semibold" id="taxAmount">$0.00</span>
                                    </div>
                                    <hr />
                                    <div class="d-flex justify-content-between">
                                        <span class="h5 fw-bold text-dark">Total a Pagar</span>
                                        <span class="h5 fw-bold text-primary" id="finalAmount">
                                            $0.00
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-4">
                <p class="text-muted">
                    ¡Gracias por su compra! Para consultas contacte a
                    <strong>soporte@zonahw.com</strong>
                </p>
            </div>
        </div>
    </div>
</body>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    const BASE_URL = "<?= base_url() ?>";
    const pedidoData = <?= json_encode($pedidoData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
</script>

<script src="<?= base_url('assets/js/views/front/pedidos/ver.js') ?>"></script>
<?= $this->endSection() ?>