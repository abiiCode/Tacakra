<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=" . $filename . ".xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Verdana';
    }

    .table-data {
        width: 96%;
        border-collapse: collapse;
    }

    .table-data tr th,
    .table-data tr td {
        border: 1px solid black;
        font-size: 11pt;
        font-family: Verdana;
        text-align: center;
        padding: 10px 10px 10px 10px;
    }

    h3 {
        font-family: Verdana;
    }
</style>
<h3>
    <center>Laporan Data Transaksi CAKRA 03/05</center>
</h3>
<br />
<table class="table-data">
    <thead>
        <tr>
            <th>No</th>
            <th>Nomor KK</th>
            <th>Nama</th>
            <th>Jenis Transaksi</th>
            <th>Metode Pembayaran</th>
            <th>Nominal</th>
            <th>Status</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($transaksi as $t) {
        ?>
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $t['no_kk']; ?></td>
                <td><?= $t['nama']; ?></td>
                <td><?= $t['jenis_transaksi']; ?></td>
                <td><?= $t['metode_pembayaran']; ?></td>
                <td><?= $t['nominal']; ?></td>
                <td><?= $t['status']; ?></td>
                <td><?= date('d-m-Y G:i:s', $t['tanggal']); ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>