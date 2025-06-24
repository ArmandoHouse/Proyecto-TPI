<?= $this->extend('layouts/front/plantilla') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/views/comercializacion.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<div class="container my-4">
    <h3 class="fw-bold">Preguntas Frecuentes</h3>
    <hr>

    <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    Tipos de entrega
                </button>
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <strong>¿Qué opciones tengo para recibir mi compra?</strong> <br><br>
                    Ofrecemos tres modalidades de entrega: envío a domicilio (a través de correo o mensajería privada), retiro en tienda sin costo adicional y entrega programada dentro del área metropolitana. Esta última permite coordinar día y franja horaria.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                    Formas de envío
                </button>
            </h2>
            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <strong>¿Qué servicios de envío utilizan?</strong> <br><br>
                    Trabajamos con Correo Argentino, OCA y Andreani para envíos nacionales. Para zonas cercanas, contamos con mensajería privada que permite entregas rápidas en el mismo día o al día siguiente
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                    Costos de envío
                </button>
            </h2>
            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <strong>¿Cuánto cuesta el envío?</strong> <br><br>
                    El costo varía según la zona de entrega y el peso del producto. Al momento de comprar la compra, el sistema calcula automáticamente el valor. Para compras superiores a $25.000, el envío es gratuito.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                    Plazos de entrega
                </button>
            </h2>
            <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <strong>¿Cuánto tarda en llegar mi pedido?</strong> <br><br>
                    Los envíos dentro de la ciudad se entregan en 24 a 48 hs hábiles. Para el resto del país, el plazo estimado es de 3 a 7 días hábiles, dependiendo de la distancia y el servicio de mensajería seleccionado.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                    Métodos de pago
                </button>
            </h2>
            <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <strong>¿Qué medios de pago aceptan?</strong> <br><br>
                    Podés pagar con tarjeta de crédito, débito, transferencia bancaria, Mercado Pago y efectivo en el local. Las operaciones con tarjeta se procesan en un entorno seguro, cumpliendo estándares de protección de datos.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                    Pago en cuotas
                </button>
            </h2>
            <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <strong>¿Se puede abonar en cuotas sin interés?</strong> <br><br>
                    Sí, ofrecemos planes en cuotas sin interés con bancos seleccionados según promociones vigentes. También podés acceder a cuotas con interés mediante Mercado Pago.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                Cambios y devoluciones
                </button>
            </h2>
            <div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <strong>¿Puedo devolver un producto si no estoy conforme?</strong> <br><br>
                    Sí, tenés 10 días corridos para realizar cambios o devoluciones. El producto debe estar en su empaque original, sin uso, y con el comprobante de compra. Los costos de envío en este caso corren por cuenta del cliente, salvo fallas de fábrica.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseEight" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                Contacto y atención
                </button>
            </h2>
            <div id="panelsStayOpen-collapseEight" class="accordion-collapse collapse">
                <div class="accordion-body">
                    <strong>¿Cómo puedo contactarme si tengo una duda o reclamo?</strong> <br><br>
                    Nos podés escribir por WhatsApp, correo electrónico o a través de nuestras redes sociales. También podés llamarnos de lunes a viernes de 9 a 18 hs. Respondemos dentro de las 24 hs hábiles.
                </div>
            </div>
        </div>
    </div>

</div>


<?= $this->endSection() ?>