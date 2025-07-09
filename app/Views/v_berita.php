<!-- v_berita.php -->
<div class="container mt-4">
    <h2><?= $judul ?></h2>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"> <?= session()->getFlashdata('success') ?> </div>
    <?php endif ?>

    <form action="<?= base_url('/berita') ?>" method="post" enctype="multipart/form-data">
        <div class="row mb-3">
            <div class="col-md-6">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label>Penulis</label>
                <input type="text" name="penulis" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label>Isi Berita</label>
            <textarea name="isi" class="form-control" rows="4"></textarea>
        </div>

        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Tambah Berita</button>
    </form>

    <hr>

    <table class="table table-bordered table-striped mt-4">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Gambar</th>
                <th>Isi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($berita as $row) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= esc($row['judul']) ?></td>
                    <td><?= esc($row['penulis']) ?></td>
                    <td>
                        <?php if ($row['gambar']) : ?>
                            <img src="<?= base_url('img/' . $row['gambar']) ?>" width="100">
                        <?php else : ?>
                            -
                        <?php endif ?>
                    </td>
                    <td><?= esc($row['isi']) ?></td>
                    <td>
                        <a href="<?= base_url('berita/edit/' . $row['id_berita']) ?>" class="btn btn-warning btn-sm">Edit</a>
                        <form action="<?= base_url('berita/delete/' . $row['id_berita']) ?>" method="get" style="display:inline;" onsubmit="return confirm('Yakin hapus data ini?')">
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
