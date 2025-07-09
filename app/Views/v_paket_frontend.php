<section id="courses" class="courses mt-5 pt-5">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Paket Wisata</h2>
      <p>Jelajahi berbagai pilihan paket wisata menarik dari Desa Wisata Banjaran</p>
    </div>
    <div class="row" data-aos="zoom-in" data-aos-delay="100">
      <?php foreach ($paket as $item): ?>
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-4">
        <div class="course-item">
          <img src="<?= base_url('foto/' . $item['foto']) ?>" class="img-fluid" alt="<?= $item['nama_wisata'] ?>">
          <div class="course-content">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h4><?= esc($item['nama_wisata']) ?></h4>
              <p class="price">Rp <?= number_format($item['harga'], 0, ',', '.') ?></p>
            </div>
            <p><?= substr(strip_tags($item['deskripsi']), 0, 100) ?>...</p>
            <div class="d-flex justify-content-end">
              <a href="#" class="btn btn-sm btn-outline-primary">Lihat Detail</a>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
