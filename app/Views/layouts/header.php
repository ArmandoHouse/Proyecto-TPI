<style>
  .btn {
    background-color:white;
    border: none;
    border-radius: 50%;
  }
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">

    <a class="navbar-brand" href="#">Logo</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">      
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link" href="#" >Principal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/public/productos') ?>">Comercializacion</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Comercialización</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/public/nosotros') ?>">Quienes Somos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Términos y Usos</a>
        </li>
      </ul>
    </div>

    <div class="mx-2">
      <button type="button" class="btn"><span class="fa-solid fa-magnifying-glass"></span></button>
      <button type="button" class="btn"><span class="fa-solid fa-cart-shopping"></span></button>
      <button type="button" class="btn"><span class="fa-solid fa-user"></span></button>
    </div>
</nav>