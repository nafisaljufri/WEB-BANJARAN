<div class="container mt-4">
    <h2><?= $judul ?></h2>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif ?>

    <form action="<?= base_url('/video/store') ?>" method="post">
        <div class="row mb-3">
            <div class="col-md-6">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label>URL Video (YouTube embed link)</label>
                <input type="text" name="url_video" class="form-control" required>
            </div>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Video</button>
    </form>

    <hr>

    <table class="table table-bordered table-striped mt-4">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Keterangan</th>
                <th>Preview</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($video as $row) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= esc($row['judul']) ?></td>
                    <td><?= esc($row['keterangan']) ?></td>
                    <td>
                        <iframe width="200" height="120" src="<?= esc($row['url_video']) ?>" frameborder="0" allowfullscreen></iframe>
                    </td>
                    <td>
                        <a href="<?= base_url('video/edit/' . $row['id_video']) ?>" class="btn btn-warning btn-sm">Edit</a>
                        <form action="<?= base_url('video/delete/' . $row['id_video']) ?>" method="get" style="display:inline" onsubmit="return confirm('Yakin hapus data ini?')">
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
