<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('contenido') ?>

<style>
    .card .icon {
        padding: 25px;
        max-height: 100%;
        max-width: 100%;
        object-fit: contain;
    }


    .google-map {
        padding-bottom: 50%;
        position: relative;
    }

    .google-map iframe {
        height: 100%;
        width: 100%;
        left: 0;
        top: 0;
        position: absolute;
    }
</style>

<div class="container text-center my-4 mb-4">
    <h1 class="text-center fw-bold">¿Cómo podemos ayudarte?</h1>

    <div class="my-4">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
    </div>

    <div class="row p-4 justify-content-center">
        <div class="col-auto border-box">
            <div class="card" style="width: 18rem;">
                <div class="icon">
                    <i class="fa-8x fa-solid fa-phone" width="100"></i>
                </div>
                <div class="card-body">
                    <h5 class="fw-bold card-title">Número de Teléfono</h5>
                    <p class="card-text">Some quick example text.</p>
                </div>
            </div>
        </div>
        <div class="col-auto border-box">
            <div class="card" style="width: 18rem;">
                <div class="icon">
                    <i class="fa-8x fa-solid fa-location-dot"></i>
                </div>
                <div class="card-body">
                    <h5 class="fw-bold card-title">Nuestra Oficina</h5>
                    <p class="card-text">Some quick example text.</p>
                </div>
            </div>
        </div>
        <div class="col-auto border-box">
            <div class="card" style="width: 18rem;">
                <div class="icon">
                    <i class="fa-8x fa-solid fa-envelope"></i>
                </div>
                <div class="card-body">
                    <h5 class="fw-bold card-title">Email</h5>
                    <p class="card-text">Some quick example text.</p>
                </div>
            </div>
        </div>
    </div>

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11237.940676259099!2d-58.81357741593218!3d-27.477685421453725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456b79d5bed36b%3A0xfa999f1ef3b40646!2sCorrientes!5e0!3m2!1ses!2sar!4v1745696501654!5m2!1ses!2sar" 
    width="100%" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
</div>




<?= $this->endSection() ?>