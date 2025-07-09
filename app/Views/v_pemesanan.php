<div class="container mt-4">
    <h3>Data Pemesanan</h3>
    <form action="<?= base_url('pemesanan/filter') ?>" method="get" class="row g-2 mb-3">
        <div class="col-md-3">
            <input type="date" name="tanggal_mulai" class="form-control" required>
        </div>
        <div class="col-md-3">
            <input type="date" name="tanggal_akhir" class="form-control" required>
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-primary">Filter</button>
            <a href="<?= base_url('pemesanan') ?>" class="btn btn-secondary">Reset</a>
        </div>
    </form>

    <?php if (isset($_GET['tanggal_mulai'])): ?>
        <div class="alert alert-info">
            Menampilkan pemesanan dari <strong><?= esc($_GET['tanggal_mulai']) ?></strong>
            sampai <strong><?= esc($_GET['tanggal_akhir']) ?></strong>
        </div>
    <?php endif ?>

    <a href="<?= base_url('pemesanan/export_excel') ?>" class="btn btn-success mb-2">Export Excel</a>
    <a href="<?= base_url('pemesanan/export_pdf') ?>" class="btn btn-danger mb-2">Export PDF</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Wisata</th>
                <th>Tgl Pesan</th>
                <th>Jumlah</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach ($pemesanan as $row): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= esc($row['nama_lengkap']) ?></td>
                <td><?= esc($row['email']) ?></td>
                <td><?= esc($row['no_hp']) ?></td>
                <td><?= esc($row['nama_wisata']) ?></td>
                <td><?= esc($row['tanggal_pesan']) ?></td>
                <td><?= esc($row['jumlah_orang']) ?> orang</td>
                <td><span class="badge bg-<?= $row['status'] == 'pending' ? 'warning' : ($row['status'] == 'dibayar' ? 'primary' : 'success') ?>">
                    <?= ucfirst($row['status']) ?></span>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
