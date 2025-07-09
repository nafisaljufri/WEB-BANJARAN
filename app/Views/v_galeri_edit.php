<div class="container mt-4">
    <h2>Edit Galeri</h2>

    <form action="<?= base_url('galeri/update/' . $galeri['id_gallery']) ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" value="<?= esc($galeri['judul']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control" rows="3"><?= esc($galeri['keterangan']) ?></textarea>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Ganti Foto (Kosongkan jika tidak ingin ganti)</label><br>
            <?php if ($galeri['foto']) : ?>
                <img src="<?= base_url('img/' . $galeri['foto']) ?>" width="150" class="img-thumbnail mb-2">
            <?php endif; ?>
            <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="<?= base_url('galeri') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
