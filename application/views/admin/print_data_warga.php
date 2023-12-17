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

        .frame {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .judul {
            margin-top: 2;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .sub-judul {
            margin-top: 0;
            padding-top: 0;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .alamat {
            margin-top: 0;
            padding-top: 0;
            margin-bottom: 1px;

        }

        .hr1 {
            margin-top: 0;
            padding-top: 0;
            margin-bottom: 0;
            padding-bottom: 0;
            width: 90%;
            height: 0.8px;
            background-color: black;
            border: 1px solid black;
        }

        .hr2 {
            margin-top: 2px;
            width: 90%;
            height: 0.3px;
            background-color: black;
            border: 1px solid black;
        }

        .bold {
            font-weight: bold;
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
    <div class="frame">
        <h3 class="judul">Tabungan & Simpanan Wajib </h3>
        <br>
        <h5 class="alamat">Ds. Munjungagung Dk. Karangjati Rt.003/Rw.005 Kec.Kramat, Kab.Tegal, Jawa Tengah</h5>
        <hr class="hr1">
        <hr class="hr2">
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
                    <th>Kelas</th>
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
    </div>
    <script type="text/javascript">
        window.print()
    </script>
</body>

</html>