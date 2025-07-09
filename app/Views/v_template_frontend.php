
<!DOCTYPE html>
<html lang="en">

<head>
  <style>
@media (max-width: 991px) {
  #header .d-flex.align-items-center {
    flex-direction: column;
    align-items: flex-start;
  }

  #header .logo {
    margin-bottom: 10px;
  }

  #header form {
    width: 100%;
    margin-top: 10px;
  }

  #header .get-started-btn {
    margin-top: 10px;
  }
}

.get-started-btn {
  background-color: #4cd964;
  color: white;
  padding: 6px 18px;
  border-radius: 50px;
  font-weight: 600;
  font-size: 14px;
  text-align: center;
  line-height: 1.2;
  display: inline-block;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  max-width: 100%;
  box-sizing: border-box;
  border: none;
}


.get-started-btn:hover {
  background: #3ac162;
  color: #fff;
}

.nav-item {
  display: flex;
  align-items: center;
}

  .alert {
    animation: fadeInSlide 0.5s ease-in-out;
  }

  @keyframes fadeInSlide {
    from {
      opacity: 0;
      transform: translateY(-20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  #searchInput {
    width: 200px !important;
    min-width: 200px;
  }

  /* Jarak antar elemen navbar */
  .navbar-nav li {
    margin-right: 15px;
  }

  /* Align tombol logout agar tidak menabrak kanan */
  .get-started-btn {
    margin-left: 15px;
    padding: 8px 20px;
    font-size: 14px;
    border-radius: 25px;
  }

  /* Untuk autocomplete agar tidak menabrak elemen lain */
  #autocompleteList {
    max-height: 200px;
    overflow-y: auto;
    background: white;
    z-index: 999;
  }

  /* Responsive tweak jika perlu */
  @media (max-width: 768px) {
    #searchInput {
      width: 100%;
    }
  }
</style>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Desa Wisata Banjaran - <?= isset($judul) ? $judul : 'Beranda'; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url('frontend') ?>/assets/img/favicon.png" rel="icon">
  <link href="<?= base_url('frontend') ?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('frontend') ?>/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?= base_url('frontend') ?>/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url('frontend') ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('frontend') ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url('frontend') ?>/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url('frontend') ?>/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url('frontend') ?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('frontend') ?>/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mentor - v4.9.1
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center justify-content-between">

    <!-- Logo & Judul -->
    <div class="d-flex align-items-center">
      <img src="<?= base_url('logo/logodesa.jpg') ?>" alt="Logo" width="90" class="me-2">
      <h1 class="logo mb-0"><a href="<?= base_url('home') ?>" style="font-size: 20px;">DESA WISATA BANJARAN</a></h1>
    </div>

    <!-- Navbar -->
    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="active" href="<?= base_url('home')?>">Beranda</a></li>
        <li><a href="#popular-courses">Sejarah</a></li>
        <li><a href="<?= base_url('paket') ?>">Paket Wisata</a></li>
        <li><a href="#galeri">Galeri</a></li>
        <li class="dropdown"><a href="#"><span>Berita</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="#">Drop Down 1</a></li>
            <li><a href="#">Drop Down 2</a></li>
            <li><a href="#">Drop Down 3</a></li>
            <li><a href="#">Drop Down 4</a></li>
          </ul>
        </li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>

    <!-- Kanan: Pencarian, Cart, Login -->
    <div class="d-flex align-items-center">

      <!-- Form Pencarian -->
      <form class="d-flex me-3 position-relative" action="<?= base_url('/') ?>" method="get" autocomplete="off">
        <input id="searchInput" class="form-control me-2" type="search" name="q" placeholder="Cari wisata..." value="<?= esc($keyword ?? '') ?>">
        <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
        <div id="autocompleteList" class="list-group position-absolute mt-2 w-100 shadow-sm"></div>
      </form>

      <!-- Cart -->
      <a href="<?= base_url('/pesanan-saya') ?>" class="nav-link position-relative me-3">
        <i class="bi bi-cart3" style="font-size: 1.4rem;"></i>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
          <?= $jumlah_pesanan ?? 0 ?>
        </span>
      </a>

      <!-- Login / Logout -->
      <?php if (session()->get('level')): ?>
        <a href="<?= base_url('auth/logout') ?>" class="get-started-btn">Logout</a>
      <?php else: ?>
        <a href="<?= base_url('auth') ?>" class="get-started-btn">Login</a>
      <?php endif; ?>
    </div>

  </div>
</header>

<?= isset($page) ? view($page) : '' ?>

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Mentor</h3>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Mentor</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('frontend') ?>/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?= base_url('frontend') ?>/assets/vendor/aos/aos.js"></script>
  <script src="<?= base_url('frontend') ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('frontend') ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url('frontend') ?>/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url('frontend') ?>/assets/js/main.js"></script>

  <script>
  const searchInput = document.getElementById("searchInput");
  const autocompleteList = document.getElementById("autocompleteList");

  searchInput.addEventListener("keyup", function() {
    const keyword = this.value.trim();
    if (keyword.length < 2) {
      autocompleteList.innerHTML = '';
      return;
    }

    fetch("<?= base_url('home/autocomplete?q=') ?>" + keyword)
      .then(response => response.json())
      .then(data => {
        autocompleteList.innerHTML = '';
        data.forEach(item => {
          const div = document.createElement("div");
          div.classList.add("list-group-item", "list-group-item-action");
          div.textContent = item.nama_wisata;
          div.addEventListener("click", () => {
            searchInput.value = item.nama_wisata;
            autocompleteList.innerHTML = '';
          });
          autocompleteList.appendChild(div);
        });
      });
  });

  // Tutup daftar jika klik di luar
  document.addEventListener("click", function(e) {
    if (!searchInput.contains(e.target)) {
      autocompleteList.innerHTML = '';
    }
  });
</script>
<script>
  setTimeout(() => {
    const alert = document.querySelector('.alert');
    if (alert) {
      alert.classList.add('fade');
      setTimeout(() => alert.remove(), 500); // setelah fadeOut selesai
    }
  }, 4000); // 4 detik
</script>

</body>

</html>