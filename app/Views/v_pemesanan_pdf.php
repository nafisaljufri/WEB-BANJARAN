<h3>Laporan Pemesanan Wisata</h3>
<table border="1" cellpadding="6" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>No</th><th>Nama</th><th>Email</th><th>No HP</th><th>Wisata</th><th>Tanggal</th><th>Jumlah</th><th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach ($pemesanan as $d): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $d['nama_lengkap'] ?></td>
            <td><?= $d['email'] ?></td>
            <td><?= $d['no_hp'] ?></td>
            <td><?= $d['id_wisata'] ?></td>
            <td><?= $d['tanggal_pesan'] ?></td>
            <td><?= $d['jumlah_orang'] ?></td>
            <td><?= $d['status'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
