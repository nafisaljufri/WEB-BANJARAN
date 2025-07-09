<section id="pesanan" class="container mt-5 mb-5">
  <div class="section-title">
    <h2>Pesanan Saya</h2>
    <p>Daftar pemesanan yang telah Anda lakukan di Desa Wisata Banjaran</p>
  </div>

  <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?= session()->getFlashdata('success') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>

  <div class="table-responsive">
    <table class="table table-bordered table-striped">
      <thead class="table-light text-center">
        <tr>
          <th>No</th>
          <th>Paket Wisata</th>
          <th>Tanggal Pesan</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($pesanan)) : ?>
          <?php $no = 1; foreach ($pesanan as $row) : ?>
            <tr>
              <td class="text-center"><?= $no++; ?></td>
              <td><?= esc($row['nama_wisata']); ?></td>
              <td><?= date('d-m-Y', strtotime($row['tanggal_pesan'])); ?></td>
              <td class="text-center">
                <?php if ($row['status'] == 'pending') : ?>
                  <span class="badge bg-warning text-dark">Pending</span>
                <?php elseif ($row['status'] == 'dibayar') : ?>
                  <span class="badge bg-success">Dibayar</span>
                <?php else : ?>
                  <span class="badge bg-secondary"><?= esc($row['status']) ?></span>
                <?php endif ?>
              </td>
              <td class="text-center">
                <a href="#" class="btn btn-sm btn-info"><i class="bi bi-eye"></i> Detail</a>
                <?php if ($row['status'] == 'pending') : ?>
                  <a href="<?= base_url('home/pembayaran/' . $row['id_pesan']) ?>" class="btn btn-sm btn-success"><i class="bi bi-wallet2"></i> Bayar</a>
                <?php endif ?>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else : ?>
          <tr>
            <td colspan="5" class="text-center">Belum ada pesanan.</td>
          </tr>
        <?php endif ?>
      </tbody>
    </table>
  </div>
</section>
