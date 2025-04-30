<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('styles') ?>
  <link rel="stylesheet" href="<?= base_url('public/assets/css/views/quienes_somos.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>


<div class="bg-body-secondary">
    <div class="container about">
        <div class="row justify-content-between">
            <div class="text-col col-6">
                <h1 class="pt-4 pb-4 fw-bold">About Us</h1>

                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

                It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
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
                    <h5 class="card-title"><i class="fa-solid fa-cloud feature fa-3x"></i>Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>

        <div class="col-3 mb-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><i class="fa-solid fa-cloud feature fa-3x"></i>Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>

        <div class="col-3 mb-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><i class="fa-solid fa-cloud feature fa-3x"></i>Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-between">
        <div class="col-3 mb-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><i class="fa-solid fa-cloud feature fa-3x"></i>Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>

        <div class="col-3 mb-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><i class="fa-solid fa-cloud feature fa-3x"></i>Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>

        <div class="col-3 mb-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><i class="fa-solid fa-cloud feature fa-3x"></i>Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>