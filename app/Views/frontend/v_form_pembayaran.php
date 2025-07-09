<section class="container mt-5">
    <br>
  <h2>Selesaikan Pembayaran</h2>
  <form action="<?= base_url('home/simpanPembayaran') ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_pesan" value="<?= $id_pesan ?>">
    
    <div class="mb-3">
      <label>Jumlah Bayar</label>
      <input type="number" name="jumlah_bayar" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Metode Pembayaran</label>
      <select name="metode" class="form-select" required>
        <option value="">-- Pilih Metode --</option>
        <option value="Transfer Bank">Transfer Bank</option>
        <option value="E-Wallet">E-Wallet</option>
      </select>
    </div>

    <div class="mb-3">
      <label>Upload Bukti Transfer</label>
      <input type="file" name="bukti_bayar" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Kirim Pembayaran</button>
  </form>
</section>
