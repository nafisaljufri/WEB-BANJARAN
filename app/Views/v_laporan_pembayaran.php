<div class="card">
    <div class="card-header">
        <h4>Laporan Pembayaran & Pemesanan</h4>
    </div>
    <div class="card-body">
        <form method="post" action="<?= base_url('laporan/filter') ?>" class="form-inline mb-3">
            <input type="date" name="tanggal_mulai" class="form-control mr-2" required>
            <input type="date" name="tanggal_akhir" class="form-control mr-2" required>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>

        <?php if (isset($laporan) && $laporan): ?>

            <!-- ✅ Tampilkan periode jika tersedia -->
            <?php if (isset($tgl_awal) && isset($tgl_akhir)): ?>
                <div class="alert alert-info">
                    Menampilkan data dari tanggal <strong><?= date('d-m-Y', strtotime($tgl_awal)) ?></strong>
                    sampai <strong><?= date('d-m-Y', strtotime($tgl_akhir)) ?></strong>.
                </div>
            <?php endif; ?>

            <!-- Tombol Export -->
            <form action="<?= base_url('laporan/excel') ?>" method="post" target="_blank" style="display:inline;">
                <input type="hidden" name="tanggal_mulai" value="<?= $tgl_awal ?>">
                <input type="hidden" name="tanggal_akhir" value="<?= $tgl_akhir ?>">
                <button type="submit" class="btn btn-success btn-sm">Export Excel</button>
            </form>

            <form action="<?= base_url('laporan/pdf') ?>" method="post" target="_blank" style="display: inline-block;">
                <input type="hidden" name="tanggal_mulai" value="<?= $tgl_awal ?>">
                <input type="hidden" name="tanggal_akhir" value="<?= $tgl_akhir ?>">
                <button type="submit" class="btn btn-danger btn-sm">Export PDF</button>
            </form>
            <br><br>

            <!-- Tabel Data -->
            <table class="table table-bordered">
                <thead class="bg-info text-white">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tgl Pesan</th>
                        <th>Jumlah Orang</th>
                        <th>Tgl Bayar</th>
                        <th>Jumlah Bayar</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($laporan as $row): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= esc($row['nama_user']) ?></td>
                        <td><?= $row['tanggal_pesan'] ?></td>
                        <td><?= $row['jumlah_orang'] ?></td>
                        <td><?= $row['tanggal_bayar'] ?></td>
                        <td>Rp <?= number_format($row['jumlah_bayar'], 0, ',', '.') ?></td>
                        <td><?= ucfirst($row['status']) ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-warning">Silakan filter tanggal terlebih dahulu untuk melihat laporan.</div>
        <?php endif ?>
    </div>
</div>
