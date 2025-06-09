<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('public/assets/css/views/contacto.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('contenido') ?>

<style>
    .circle1 {
        background-color: pink;
        margin: 10%;
        padding: 15%;
        border-radius: 100%;
        font-size: 3em !important;
    }
</style>

<div class="container text-center my-4 mb-4">
    <h1 class="text-center fw-bold">¿Cómo podemos ayudarte?</h1>

    <div class="row justify-content-center">
        <div class="col-6 p-3">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11237.940676259099!2d-58.81357741593218!3d-27.477685421453725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456b79d5bed36b%3A0xfa999f1ef3b40646!2sCorrientes!5e0!3m2!1ses!2sar!4v1745696501654!5m2!1ses!2sar"
                width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
        </div>
    </div>

    <hr>
    
    <div class="row justify-content-between">

        <div class="col-md-2">
            <div class="d-flex flex-column align-items-center">
                <i class="circle1 icon fa-solid fa-user fs-4 mb-2"></i>
                <p class="mb-0 small">...</p>
            </div>
        </div>
        <div class="col-md-2">
            <div class="d-flex flex-column align-items-center">
                <i class="circle1 icon fa-solid fa-building fs-4 mb-2"></i>
                <p class="mb-0 small">...</p>
            </div>
        </div>
        <div class="col-md-2">
            <div class="d-flex flex-column align-items-center">
                <i class="circle1 icon fa-solid fa-location-dot fs-4 mb-2"></i>
                <p class="mb-0 small">...</p>
            </div>
        </div>
        <div class="col-md-2">
            <div class="d-flex flex-column align-items-center">
                <i class="circle1 icon fa-solid fa-phone fs-4 mb-2"></i>
                <p class="mb-0 small">...</p>
            </div>
        </div>
        <div class="col-md-2">
            <div class="d-flex flex-column align-items-center">
                <i class="circle1 icon fa-solid fa-envelope fs-4 mb-2"></i>
                <p class="mb-0 small">...</p>
            </div>
        </div>
    </div>



</div>




<?= $this->endSection() ?>