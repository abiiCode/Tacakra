<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
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
</head>

<body>
    <h3>
        <center>Laporan Data Warga Rt.003/Rw.005</center>
    </h3>
    <br />
    <table class="table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor KK</th>
                <th>Nama</th>
                <th>Komplek</th>
                <th>Jenis Kelamin</th>
                <th>No telepon</th>
                <th>Tahun Masuk</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($warga as $w) {
            ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $w['no_kk']; ?></td>
                    <td><?= $w['nama']; ?></td>
                    <td><?= $w['komplek']; ?></td>
                    <td><?= $w['jenis_kelamin']; ?></td>
                    <td><?= $w['no_telepon']; ?></td>
                    <td><?= $w['tahun_masuk']; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>