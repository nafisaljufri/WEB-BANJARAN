<section id="form-pesan" class="contact" style="margin-top: 120px;">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Form Pemesanan</h2>
      <p>Silakan isi data pemesanan Anda dengan lengkap</p>
    </div>

    <div class="row justify-content-center mt-4">
      <div class="col-lg-8">
        <form action="<?= base_url('pemesanan/simpan') ?>" method="post">
          <div class="row">
            <div class="col-md-6 form-group">
              <label for="nama_lengkap">Nama Lengkap</label>
              <input type="text" name="nama_lengkap" class="form-control" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email">
            </div>
          </div>

          <div class="form-group mt-3">
            <label for="no_hp">No. HP</label>
            <input type="text" class="form-control" name="no_hp" required>
          </div>

          <div class="form-group mt-3">
            <label for="id_wisata">Paket Wisata</label>
            <select name="id_wisata" class="form-select" required>
              <option value="">-- Pilih Paket --</option>
              <?php foreach ($paket as $p): ?>
                <option value="<?= $p['id_wisata'] ?>"><?= $p['nama_wisata'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="row mt-3">
            <div class="col-md-6 form-group">
              <label for="tanggal_pesan">Tanggal Pesan</label>
              <input type="date" name="tanggal_pesan" class="form-control" required>
            </div>
            <div class="col-md-6 form-group">
              <label for="jumlah_orang">Jumlah Orang</label>
              <input type="number" name="jumlah_orang" class="form-control" required min="1">
            </div>
          </div>

          <div class="form-group mt-3">
            <label for="catatan">Catatan</label>
            <textarea name="catatan" class="form-control" rows="3" placeholder="Tulis catatan tambahan jika ada..."></textarea>
          </div>

          <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary px-5">Kirim Pesanan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
