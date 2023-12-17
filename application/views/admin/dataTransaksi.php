<style>
    .bukti {
        width: 90px;
        height: 120px;
    }
</style>
<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title; ?></h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-11">
                <?= $this->session->flashdata('pesan'); ?>
                <div class="row">
                    <!-- data Setoran Diproses -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">Setoran <span class="badge bg-primary text-light rounded-pill">Diproses</span></h5>
                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">ID User</th>
                                            <th scope="col">Jenis Transaksi</th>
                                            <th scope="col">Metode Pembayaran</th>
                                            <th scope="col">Bukti</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($setoran_proses as $st_proses) : ?>
                                            <tr>
                                                <th scope="row"><?= $i++; ?></a></th>
                                                <td><?= $st_proses['id_user']; ?></td>
                                                <td><?= $st_proses['jenis_transaksi']; ?></td>
                                                <td><?= $st_proses['metode_pembayaran']; ?></td>
                                                <td><img class="bukti" src="<?= base_url('./uploads/bukti/' . $st_proses['bukti']); ?>" alt="<?= $st_proses['bukti']; ?>"></td>
                                                <td><?= date('d/F/Y - G:i:s', $st_proses['tanggal']); ?></td>
                                                <td><a href="<?= base_url('admin/detailSetoran/' . $st_proses['id_transaksi']); ?>" rel="noopener noreferrer">Lihat Detail</a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- End Setoran proses -->
                    <!-- data Penarikan Diproses -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">Penarikan <span class="badge bg-primary text-light rounded-pill">Diproses</span></h5>
                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">ID User</th>
                                            <th scope="col">Jenis Transaksi</th>
                                            <th scope="col">Metode Pembayaran</th>
                                            <th scope="col">Bukti</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($penarikan_proses as $pn_proses) : ?>
                                            <tr>
                                                <th scope="row"><?= $i++; ?></a></th>
                                                <td><?= $pn_proses['id_user']; ?></td>
                                                <td><?= $pn_proses['jenis_transaksi']; ?></td>
                                                <td><?= $pn_proses['metode_pembayaran']; ?></td>
                                                <?php if ($pn_proses['bukti'] == '') { ?>
                                                    <td>Kosong</td>
                                                <?php } else { ?>
                                                    <td><img class="bukti" src="<?= base_url('./uploads/bukti/' . $pn_proses['bukti']); ?>" alt="<?= $pn_proses['bukti']; ?>"></td>
                                                <?php } ?>
                                                <td><?= date('d/F/Y - G:i:s', $pn_proses['tanggal']); ?></td>
                                                <td><a href="<?= base_url('admin/detailPenarikan/' . $pn_proses['id_transaksi']); ?>" rel="noopener noreferrer">Lihat Detail</a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- End Penarikan proses -->
                </div>
            </div><!-- End Left side columns -->

        </div>
    </section>

</main><!-- End #main -->