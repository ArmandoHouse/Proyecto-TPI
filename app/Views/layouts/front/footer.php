<footer class="bg-dark text-light pt-5">
  <div class="container">
    <div class="row justify-content-between">

      <!-- Contactos -->
      <div class="col-lg-3 col-md-6 mb-4">
        <h5 class="footer-title mb-3" style="color: var(--zonahw-white); font-weight: 600;">Contactos</h5>

        <ul class="nav flex-column">
          <li class="nav-item mb-2">
            <a href="tel:+541112345678" class="footer-link text-secondary">
              <i class="bi bi-telephone-fill me-2"></i>+54 11 1234-5678
            </a>
          </li>
          <li class="nav-item mb-2">
            <a href="mailto:info@zonahardware.com" class="footer-link text-secondary">
              <i class="bi bi-envelope-fill me-2"></i>info@zonahardware.com
            </a>
          </li>
          <li class="nav-item mb-2">
            <span class="footer-link text-secondary">
              <i class="bi bi-geo-alt-fill me-2"></i>Corrientes, Argentina
            </span>
          </li>
        </ul>
      </div>

      <!-- Acerca de -->
      <div class="col-lg-3 col-md-6 mb-4">
        <h5 class="footer-title mb-3" style="color: var(--zonahw-white); font-weight: 600;">Acerca de</h5>
        <ul class="nav flex-column">
          <li class="mb-2"><a href="<?=base_url('quienes_somos') ?>" class="footer-link">Quiénes somos</a></li>
          <li class="mb-2"><a href="<?=base_url('comercializacion') ?>" class="footer-link">Comercialización</a></li>
          <li class="mb-2"><a href="<?=base_url('terminos') ?>" class="footer-link">Terminos y Usos</a></li>
        </ul>
      </div>



      <!-- Redes Sociales -->
      <div class="col-lg-3 col-md-6 mb-4">
        <h5 class="footer-title mb-3" style="color: var(--zonahw-white); font-weight: 600;">Síguenos</h5>
        <div class="d-flex">
          <a href="#" class="text-secondary me-3 fs-4"><i class="bi bi-facebook"></i></a>
          <a href="#" class="text-secondary me-3 fs-4"><i class="bi bi-instagram"></i></a>
          <a href="#" class="text-secondary me-3 fs-4"><i class="bi bi-twitter-x"></i></a>
          <a href="#" class="text-secondary fs-4"><i class="bi bi-whatsapp"></i></a>
        </div>
      </div>

    </div>

    <div class="text-center p-4 border-top border-secondary">
      &copy; <?= date('Y') ?> Zona Hardware. Todos los derechos reservados.
    </div>
  </div>
</footer>

<style>
  .footer-link {
    color: #ccc;
    text-decoration: none;
    font-size: 0.9rem;
    transition: color 0.3s ease;
  }

  .footer-link:hover {
    color: white;
    text-decoration: underline;
  }

  .social-link {
    transition: transform 0.3s ease;
  }

  .social-link:hover {
    transform: scale(1.1);
  }

  .partner-logo {
    filter: grayscale(100%);
    transition: filter 0.3s ease;
  }

  .partner-logo:hover {
    filter: grayscale(0%);
  }
</style>