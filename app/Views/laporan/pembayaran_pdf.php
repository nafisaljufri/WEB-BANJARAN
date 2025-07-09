<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pembayaran</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { border-collapse: collapse; width: 100%; margin-top: 10px; }
        table, th, td { border: 1px solid black; padding: 6px; }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; }
        .info { margin-top: 10px; }
    </style>
</head>
<body>
    <h2>Laporan Pembayaran & Pemesanan</h2>
    <p class="info">Periode: <?= date('d-m-Y', strtotime($mulai)) ?> s/d <?= date('d-m-Y', strtotime($akhir)) ?></p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tgl Pesan</th>
                <th>Jumlah Orang</th>
                <th>Tgl Bayar</th>
                <th>Jumlah Bayar</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($laporan as $row): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= esc($row['nama_user']) ?></td>
                <td><?= $row['tanggal_pesan'] ?></td>
                <td><?= $row['jumlah_orang'] ?></td>
                <td><?= $row['tanggal_bayar'] ?></td>
                <td>Rp <?= number_format($row['jumlah_bayar'], 0, ',', '.') ?></td>
                <td><?= ucfirst($row['status']) ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>
