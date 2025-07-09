 <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>Aktivitas Bersama,<br>Belajar Bersama.</h1>
      <h2>Wisata desa dengan berbagai edukasi nilai budaya Desa Banjaran.</h2>
      <a href="courses.html" class="btn-get-started">Selengkapnya</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="<?= base_url('foto') ?>/sejarahdesa.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Tentang Desa Wisata Banjaran</h3>
            <p class="fst-italic">
              Wisata Klawing Sonten Banjarandap Desa Banjaran adalah sebuah destinasi wisata yang memadukan antara wisata alam dan buatan, wisata alam karena lokasinya yang berada disekitaran Bendungan (Bendung Slinga) dan bantaran Sungai Klawing yang merupakan salah satu Sungai terpanjang dan terbesar di Kabupaten Purbalingga, wisata buatan karena disitu juga menampilkan kesenian Daerah seperti Kuda Lumping yang secara rutin dijadwalkan setiap bulannya. kemudian Hasil Produk-produk Lokal dan Kuliner lokal dipasarkan dilokasi wisata oleh para pelaku UMKM yang berjualan di lokasi wisata.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Liburan Keluarga </li>
              <li><i class="bi bi-check-circle"></i> Studi Banding </li>
              <li><i class="bi bi-check-circle"></i> Edukasi </li>
            </ul>
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
            </p>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="1232" data-purecounter-duration="1" class="purecounter"></span>
            <p>Students</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="64" data-purecounter-duration="1" class="purecounter"></span>
            <p>Courses</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="42" data-purecounter-duration="1" class="purecounter"></span>
            <p>Events</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
            <p>Trainers</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->
<style>

.course-item {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  border: 1px solid #eee;
  border-radius: 10px;
  overflow: hidden;
  background-color: #fff;
}

.course-item:hover {
  transform: scale(1.03);
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
  cursor: pointer;
  border-color: #007bff;
}

.course-item img {
  transition: transform 0.3s ease;
}

.course-item:hover img {
  transform: scale(1.05);
}
</style>
    <!-- ======= Popular Courses Section ======= -->
<section id="popular-courses" class="courses">
  <div class="container" data-aos="fade-up">
<center>
    <div class="section-title">
      <p>PAKET WISATA & HOMESTAY</p>
    </div>
</center>
    <div class="row" data-aos="zoom-in" data-aos-delay="100">
      <?php foreach ($paket as $p): ?>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
          <div class="course-item">
            <img src="<?= base_url('foto/' . $p['foto']) ?>" alt="Foto Wisata"
                 style="width:100%; height:200px; object-fit:cover; object-position:center;">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Paket Wisata</h4>
                <p class="price">Rp <?= number_format($p['harga'], 0, ',', '.') ?></p>
              </div>

              <h3><a href="#"><?= esc($p['nama_wisata']) ?></a></h3>
              <p><?= word_limiter(strip_tags($p['deskripsi']), 20) ?></p>

              <div class="trainer d-flex justify-content-between align-items-center">
                <a href="<?= base_url('pemesanan/form/' . $p['id_wisata']) ?>" class="btn btn-outline-primary">Pesan Sekarang</a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<!-- ======= Galeri Wisata Section ======= -->
<section id="galeri" class="trainers">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Galeri</h2>
      <p>Dokumentasi Kegiatan & Destinasi Wisata</p>
    </div>

    <div class="row" data-aos="zoom-in" data-aos-delay="100">
      <?php foreach ($galeri as $g): ?>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <div class="member">
            <img src="<?= base_url('foto/' . $g['foto']) ?>" class="img-fluid" alt="<?= esc($g['judul']) ?>">
            <div class="member-content">
              <h4><?= esc($g['judul']) ?></h4>
              <p><?= esc($g['keterangan']) ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>
<!-- End Galeri Wisata Section -->

<!-- ======= Video Wisata Section ======= -->
<section id="video" class="trainers">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Video</h2>
      <p>Video Kegiatan & Destinasi Wisata</p>
    </div>

    <div class="row" data-aos="zoom-in" data-aos-delay="100">
      <?php foreach ($video as $v): ?>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-4">
          <div class="member w-100">
            <div class="embed-responsive embed-responsive-16by9 mb-2">
              <iframe class="embed-responsive-item" 
                      src="<?= esc($v['url_video']) ?>" 
                      allowfullscreen 
                      style="width: 100%; height: 200px; border: none;"></iframe>
            </div>
            <div class="member-content">
              <h4><?= esc($v['judul']) ?></h4>
              <p><?= esc($v['keterangan']) ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>


    <!-- ======= Why Us Section ======= -->
<?php if (!empty($berita)) : ?>
  <?php $highlight = $berita[0]; ?>
  <section id="berita" class="why-us">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <!-- Kiri: Berita Highlight -->
        <div class="col-lg-4 d-flex align-items-stretch">
          <div class="content">
            <h3>Berita Terbaru</h3>
            <p>
              Dapatkan kabar dan informasi terbaru seputar wisata, event, dan aktivitas menarik di Desa Banjaran.
            </p>
            <div class="text-center">
              <a href="<?= base_url('berita/detail/' . $highlight['id_berita']) ?>" class="more-btn">Baca Selengkapnya</a>
            </div>
          </div>
        </div>

        <!-- Kanan: Daftar berita dengan gambar -->
        <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-boxes d-flex flex-column justify-content-center">
            <div class="row">
              <?php foreach ($berita as $b): ?>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0 text-center">
                    <?php if (!empty($b['gambar'])): ?>
                      <img src="<?= base_url('foto/' . $b['gambar']) ?>" class="img-fluid mb-2" style="height:150px; object-fit:cover;" alt="<?= esc($b['judul']) ?>">
                    <?php endif; ?>
                    <h4><?= esc($b['judul']) ?></h4>
                    <p><?= character_limiter(strip_tags($b['isi']), 100) ?></p>
                    <a href="<?= base_url('berita/detail/' . $b['id_berita']) ?>" class="more-btn">Baca Selengkapnya</a>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>


    </div>
  </div>
</section>
    </section><!-- End Why Us Section -->

  </main><!-- End #main -->