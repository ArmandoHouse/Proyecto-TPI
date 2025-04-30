<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('public/assets/css/views/quienes_somos.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>


<div class="bg-body-secondary">
    <div class="container about">
        <div class="row justify-content-between">
            <div class="text-col col-6">
                <h1 class="pt-4 pb-4 fw-bold">Soluciones reales para los amantes del hardware</h1>

                <p>Nos dedicamos a la venta de componentes y productos tecnológicos de alta calidad. Nos enfocamos en brindar un servicio de calidad al cliente, atención personalizada y asesoramiento para que cada compra sea una inversión segura y satisfactoria.</p>

                Creemos que el hardware no es solo un conjunto de piezas, sino el motor que impulsa tus proyectos, pasatiempos y desafíos. Por eso, en Zona Hardware trabajamos para que cada cliente encuentre exactamente lo que necesita, al mejor precio y con la confianza de estar eligiendo calidad.
            </div>
            <div class="col-6">
                <img src="assets/img/card.jpg" alt="img">
            </div>
        </div>
    </div>
</div>


<div class="container mb-4 mt-4 ">
    <h2 class="fw-bold mb-4">Qué ofrecemos</h2>

    <div class="row justify-content-between">
        <div class="col-3 mb-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><i class="fa-solid fa-cloud feature fa-3x"></i>Calidad</h5>
                    <p class="card-text">Productos originales y seleccionados para garantizar el mejor rendimiento y durabilidad.</p>
                </div>
            </div>
        </div>

        <div class="col-3 mb-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><i class="fa-solid fa-cloud feature fa-3x"></i>Rapidez</h5>
                    <p class="card-text">Despachos ágiles y atención inmediata para que tengas tu hardware cuando lo necesitás.</p>
                </div>
            </div>
        </div>

        <div class="col-3 mb-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><i class="fa-solid fa-cloud feature fa-3x"></i>Asesoramiento</h5>
                    <p class="card-text">Te ayudamos a elegir el componente ideal según tus necesidades y presupuesto.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-between">
        <div class="col-3 mb-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><i class="fa-solid fa-cloud feature fa-3x"></i>Precio justo</h5>
                    <p class="card-text">Ofrecemos los mejores precios del mercado sin comprometer la calidad.</p>
                </div>
            </div>
        </div>

        <div class="col-3 mb-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><i class="fa-solid fa-cloud feature fa-3x"></i>Confianza</h5>
                    <p class="card-text">Compras seguras, con garantía y soporte postventa para tu tranquilidad.</p>
                </div>
            </div>
        </div>

        <div class="col-3 mb-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><i class="fa-solid fa-cloud feature fa-3x"></i>Variedad</h5>
                    <p class="card-text">Un catálogo completo con las últimas novedades en tecnología y componentes.</p>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>