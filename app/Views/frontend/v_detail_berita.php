<div><br></div>
<section class="inner-page">
  <div class="container mt-5">
    <h2 class="mb-3"><?= esc($berita['judul']) ?></h2>
    <p><small>Ditulis oleh: <?= esc($berita['penulis']) ?> | <?= date('d M Y H:i', strtotime($berita['created_at'])) ?></small></p>
    
    <?php if ($berita['gambar']) : ?>
      <img src="<?= base_url('foto/' . $berita['gambar']) ?>" class="img-fluid mb-4" alt="<?= esc($berita['judul']) ?>">
    <?php endif; ?>

    <p><?= $berita['isi'] ?></p>

    <a href="<?= base_url('/') ?>" class="btn btn-secondary mt-3">← Kembali ke Beranda</a>
  </div>
</section>
