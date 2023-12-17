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
        <center>Laporan Data Tabungan Warga Rt.003/Rw.005</center>
    </h3>
    <br />
    <table class="table-data">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nomor KK</th>
                <th scope="col">Nama</th>
                <th scope="col">Komplek</th>
                <th scope="col">No Telepon</th>
                <th scope="col">Saldo</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($tabungan as $tab) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></a></th>
                    <td><?= $tab['no_kk']; ?></td>
                    <td><?= $tab['nama']; ?></td>
                    <td><?= $tab['komplek']; ?></td>
                    <td><?= $tab['no_telepon']; ?></td>
                    <td><?= 'Rp. ' . $tab['saldo']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>