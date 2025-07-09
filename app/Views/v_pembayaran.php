<div class="card">
    <div class="card-header">
        <h4 class="card-title">Data Pembayaran</h4>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="bg-info text-white">
                <tr>
                    <th>No</th>
                    <th>Nama Pemesan</th>
                    <th>Tanggal Bayar</th>
                    <th>Jumlah</th>
                    <th>Metode</th>
                    <th>Bukti</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($pembayaran as $row): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= esc($row['nama_lengkap']) ?></td>
                    <td><?= date('d-m-Y H:i', strtotime($row['tanggal_bayar'])) ?></td>
                    <td>Rp <?= number_format($row['jumlah_bayar'], 0, ',', '.') ?></td>
                    <td><?= esc($row['metode']) ?></td>
                    <td>
                        <?php if ($row['bukti_bayar']): ?>
                            <a href="<?= base_url('bukti/' . $row['bukti_bayar']) ?>" target="_blank">Lihat</a>
                        <?php else: ?>
                            -
                        <?php endif ?>
                    </td>
                    <td>
                        <?php if ($row['status'] == 'menunggu'): ?>
                            <span class="badge bg-warning text-dark">Menunggu</span>
                        <?php elseif ($row['status'] == 'terverifikasi'): ?>
                            <span class="badge bg-success">Terverifikasi</span>
                        <?php else: ?>
                            <span class="badge bg-danger">Gagal</span>
                        <?php endif ?>
                    </td>
                    <td>
                        <?php if ($row['status'] == 'menunggu'): ?>
                            <a href="<?= base_url('pembayaran/verifikasi/' . $row['id_bayar']) ?>" class="btn btn-success btn-sm">Verifikasi</a>
                            <a href="<?= base_url('pembayaran/gagal/' . $row['id_bayar']) ?>" class="btn btn-danger btn-sm">Gagal</a>
                        <?php endif ?>
                        <a href="<?= base_url('pembayaran/hapus/' . $row['id_bayar']) ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus pembayaran ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <div class="d-flex justify-content-end mb-3">
  <form action="<?= base_url('admin/exportPembayaran') ?>" method="get" class="d-flex" target="_blank">
    <input type="date" name="mulai" class="form-control me-2" required>
    <input type="date" name="akhir" class="form-control me-2" required>
    <button type="submit" class="btn btn-success"><i class="bi bi-file-earmark-arrow-down"></i> Export PDF</button>
  </form>
</div>
    </div>
</div>
