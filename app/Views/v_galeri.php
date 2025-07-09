<div class="container mt-4">
    <h2><?= $judul ?></h2>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif ?>

    <form action="<?= base_url('galeri/store') ?>" method="post" enctype="multipart/form-data">
        <div class="row mb-3">
            <div class="col-md-6">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label>Foto</label>
                <input type="file" name="foto" class="form-control" required>
            </div>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Galeri</button>
    </form>

    <hr>

    <table class="table table-bordered table-striped mt-4">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Keterangan</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($galeri as $row) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= esc($row['judul']) ?></td>
                    <td><?= esc($row['keterangan']) ?></td>
                    <td>
                        <?php if ($row['foto']) : ?>
                            <img src="<?= base_url('img/' . $row['foto']) ?>" width="100">
                        <?php else : ?>
                            -
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?= base_url('galeri/edit/' . $row['id_gallery']) ?>" class="btn btn-warning btn-sm">Edit</a>
                        <form action="<?= base_url('galeri/delete/' . $row['id_gallery']) ?>" method="get" onsubmit="return confirm('Yakin hapus data ini?')" style="display:inline;">
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
