<div class="container mt-4">
    <h2>Edit Berita</h2>

    <form action="<?= base_url('/berita/update/' . $berita['id_berita']) ?>" method="post" enctype="multipart/form-data">
        <div class="row mb-3">
            <div class="col-md-8">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control" value="<?= esc($berita['judul']) ?>" required>
            </div>
            <div class="col-md-4">
                <label>Penulis</label>
                <input type="text" name="penulis" class="form-control" value="<?= esc($berita['penulis']) ?>">
            </div>
        </div>

        <div class="mb-3">
            <label>Isi Berita</label>
            <textarea name="isi" class="form-control" rows="6" required><?= esc($berita['isi']) ?></textarea>
        </div>

        <div class="mb-3">
            <label>Ganti Gambar (centang jika ingin ganti)</label><br>
            <input type="checkbox" name="check"> Ganti Gambar<br>
            <input type="file" name="gambar" class="form-control mt-2">
            <br>
            <small>Gambar saat ini:</small><br>
            <?php if ($berita['gambar']) : ?>
                <img src="<?= base_url('img/' . $berita['gambar']) ?>" width="100">
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="<?= base_url('/berita') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
