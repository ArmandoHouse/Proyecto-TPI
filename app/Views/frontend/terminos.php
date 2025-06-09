<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('public/assets/css/views/terminos.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<div class="container my-4">
    <h3 class="fw-bold">Términos y Usos</h3>
    <hr>

    <div class="row">
        <div class="col-4">
            <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link" href="#i-1">1. Información General</a>
                    <a class="nav-link" href="#i-2">2. Uso del Sitio</a>
                    <a class="nav-link" href="#i-3">3. Servicios Ofrecidos</a>
                    <a class="nav-link" href="#i-4">4. Privacidad y Protección de Datos</a>
                    <a class="nav-link" href="#i-5">5. Procedimiento de Compra</a>
                    <a class="nav-link" href="#i-6">6. Entregas</a>
                    <a class="nav-link" href="#i-7">7. Garantías</a>
                    <a class="nav-link" href="#i-8">8. Soporte Postventa</a>
                    <a class="nav-link" href="#i-9">9. Cambios y Devoluciones</a>
                    <a class="nav-link" href="#i-10">10. Limitación de Responsabilidad</a>
                    <a class="nav-link" href="#i-11">11. Modificaciones</a>
                    <a class="nav-link" href="#i-12">12. Legislación Aplicable</a>
                </nav>
            </nav>
        </div>

        <div class="col-8">
            <div data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-smooth-scroll="true" class="scrollspy-example-2" tabindex="0">
                <div id="i-1">
                    <h4 class="fw-bold">Información General</h4>
                    <hr>
                    <p> Zona Hardware (en adelante, "la Empresa"), con domicilio en [colocar domicilio legal si corresponde], pone a disposición del público el sitio web www.zonahardware.com (en adelante, "el Sitio"), a través del cual se comercializan productos de hardware informático. Al ingresar, navegar y utilizar el Sitio, el usuario acepta expresamente los presentes Términos y Condiciones de Uso, que son vinculantes.</p>
                </div>
                <div id="i-2">
                    <h4 class="fw-bold">Uso del Sitio</h4>
                    <hr>
                    <p> El uso del Sitio es gratuito y está destinado a personas mayores de 18 años. El usuario se compromete a utilizar el Sitio de conformidad con la ley, la moral, el orden público y los presentes términos. Se prohíbe el uso indebido, fraudulento o que pudiera dañar a la Empresa o a terceros.</p>
                </div>
                <div id="i-3">
                    <h4 class="fw-bold">Servicios Ofrecidos</h4>
                    <hr>
                    <p>Zona Hardware ofrece productos de hardware de computadoras tales como placas de video, procesadores, memorias RAM, discos SSD, periféricos, entre otros. Los productos pueden ser adquiridos mediante compra online, sujeto a disponibilidad de stock y validación de pago.</p>
                </div>
                <div id="i-4">
                    <h4 class="fw-bold">Privacidad y Protección de Datos</h4>
                    <hr>
                    <p>La Empresa se compromete a proteger la privacidad de los usuarios. Los datos personales recolectados a través del Sitio serán utilizados exclusivamente para procesar pedidos, brindar soporte y mejorar la experiencia de compra. La información no será compartida con terceros salvo requerimiento legal o consentimiento explícito del usuario. El usuario puede ejercer sus derechos de acceso, rectificación o eliminación de datos enviando un correo a: info@zonahardware.com .</p>
                </div>
                <div id="i-5">
                    <h4 class="fw-bold">Procedimiento de Compra</h4>
                    <hr>
                    <p>Para adquirir un producto, el usuario debe:
                    <ul>
                        <li>Seleccionar el producto deseado y agregarlo al carrito.</li>
                        <li>Completar sus datos personales y dirección de entrega.</li>
                        <li>Seleccionar medio de pago y confirmar la operación.
                        </li>
                        <li>Recibirá una confirmación por correo electrónico con los detalles del pedido.</li>
                    </ul>
                    La venta se considerará concluida cuando se verifique el pago correspondiente.
                </div>
                <div id="i-6">
                    <h4 class="fw-bold">Entregas</h4>
                    <hr>
                    <p>Los productos se entregan a domicilio a través de servicios de correo registrados o pueden retirarse en puntos de entrega autorizados. Los plazos de entrega varían según la ubicación del comprador y la disponibilidad del producto, con un promedio estimado de 3 a 7 días hábiles. La Empresa no se responsabiliza por demoras atribuibles a terceros.</p>
                </div>
                <div id="i-7">
                    <h4 class="fw-bold">Garantías</h4>
                    <hr>
                    <p>Todos los productos comercializados por Zona Hardware cuentan con garantía legal y/o del fabricante. La duración de la garantía puede variar según el producto y está especificada en la descripción del mismo. Para hacer uso de la garantía, el cliente debe conservar el comprobante de compra y comunicarse con el soporte técnico.</p>
                </div>
                <div id="i-8">
                    <h4 class="fw-bold">Soporte Postventa</h4>
                    <hr>
                    <p>Zona Hardware ofrece soporte técnico postventa a través de los canales de contacto oficiales: correo electrónico info@zonahardware.com. El soporte se limita al diagnóstico y asistencia básica de instalación/configuración de productos adquiridos en el sitio.</p>
                </div>
                <div id="i-9">
                    <h4 class="fw-bold">Cambios y Devoluciones</h4>
                    <hr>
                    <p>El cliente podrá solicitar el cambio o devolución de un producto dentro de los 10 días hábiles posteriores a la recepción, siempre que el producto se encuentre sin uso, en su empaque original y con todos sus accesorios. Los costos de envío por devoluciones corren por cuenta del cliente, salvo error o defecto atribuible a la Empresa.</p>
                </div>
                <div id="i-10">
                    <h4 class="fw-bold">Limitación de Responsabilidad</h4>
                    <hr>
                    <p>La Empresa no será responsable por daños directos o indirectos derivados del uso del Sitio o de la compra de productos, incluyendo, pero no limitado a, pérdidas de datos, lucro cesante o fallas de funcionamiento.</p>
                </div>
                <div id="i-11">
                    <h4 class="fw-bold">Modificaciones</h4>
                    <hr>
                    <p>La Empresa se reserva el derecho de modificar en cualquier momento estos Términos y Condiciones. Las modificaciones entrarán en vigor desde su publicación en el Sitio. Es responsabilidad del usuario revisarlos periódicamente.</p>
                </div>
                <div id="i-12">
                    <h4 class="fw-bold">Legislación Aplicable</h4>
                    <hr>
                    <p>Estos Términos y Condiciones se rigen por las leyes de la República Argentina. Cualquier conflicto será resuelto por los tribunales ordinarios de la Ciudad Autónoma de Buenos Aires, salvo disposición legal en contrario.</p>
                </div>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection() ?>