<div class="container mt-4">
    <h2>Edit Paket Wisata</h2>

    <form action="<?= base_url('/paket-wisata/update/' . $paket['id_wisata']) ?>" method="post" enctype="multipart/form-data">
        <div class="row mb-3">
            <div class="col-md-6">
                <label>Nama Wisata</label>
                <input type="text" name="nama" class="form-control" value="<?= esc($paket['nama_wisata']) ?>" required>
            </div>
            <div class="col-md-6">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" step="0.01" value="<?= esc($paket['harga']) ?>" required>
            </div>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"><?= esc($paket['deskripsi']) ?></textarea>
        </div>

        <div class="mb-3">
            <label>Ganti Foto (centang jika ingin ganti)</label><br>
            <input type="checkbox" name="check"> Ganti Foto<br>
            <input type="file" name="foto" class="form-control mt-2">
            <br>
            <small>Foto saat ini:</small><br>
            <?php if ($paket['foto']) : ?>
                <img src="<?= base_url('img/' . $paket['foto']) ?>" width="100">
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="<?= base_url('/paket-wisata') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
