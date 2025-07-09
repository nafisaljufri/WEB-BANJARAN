<!-- v_paket_wisata.php -->
<div class="container mt-4">
    <h2><?= $judul ?></h2>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"> <?= session()->getFlashdata('success') ?> </div>
    <?php endif ?>

    <form action="<?= base_url('/paket-wisata') ?>" method="post" enctype="multipart/form-data">
        <div class="row mb-3">
            <div class="col-md-6">
                <label>Nama Wisata</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" step="0.01" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="4"></textarea>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label>Foto</label>
                <input type="file" name="foto" class="form-control">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Tambah Paket</button>
    </form>

    <hr>

    <table class="table table-bordered table-striped mt-4">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Wisata</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($paket as $row) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= esc($row['nama_wisata']) ?></td>
                    <td>Rp <?= number_format($row['harga'], 2, ',', '.') ?></td>
                    <td><?= esc($row['deskripsi']) ?></td>
                    <td>
                        <?php if ($row['foto']) : ?>
                            <img src="<?= base_url('img/' . $row['foto']) ?>" width="100">
                        <?php else : ?>
                            -
                        <?php endif; ?>
                    </td>
                    <td>
						<a href="<?= base_url('paket-wisata/edit/' . $row['id_wisata']) ?>" class="btn btn-warning btn-sm">Edit</a>
						<form action="<?= base_url('paket-wisata/delete/' . $row['id_wisata']) ?>" method="get" style="display:inline;" onsubmit="return confirm('Yakin hapus data ini?')">
							<button type="submit" class="btn btn-danger btn-sm">Hapus</button>
						</form>
					</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
