<div class="container mt-4">
    <h2><?= $judul ?></h2>

    <form action="<?= base_url('/video/update/' . $video['id_video']) ?>" method="post">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="<?= esc($video['judul']) ?>" required>
        </div>
        <div class="mb-3">
            <label>URL Video</label>
            <input type="text" name="url_video" class="form-control" value="<?= esc($video['url_video']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="3"><?= esc($video['keterangan']) ?></textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="<?= base_url('/video') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
