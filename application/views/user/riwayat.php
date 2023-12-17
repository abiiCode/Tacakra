<style>
    .bukti {
        width: 90px;
        height: 120px;
    }
</style>
<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <!-- uang masuk Card -->
            <div class="col-xxl-6 col-md-6">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">Uang Masuk</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bx bx-arrow-to-bottom"></i>
                            </div>
                            <div class="ps-3">
                                <?php if ($uang_masuk['uang_masuk'] == '') {
                                    $jml_uMasuk = 0;
                                } else {
                                    $jml_uMasuk = $uang_masuk['uang_masuk'];
                                } ?>
                                <h6><?= $jml_uMasuk; ?></h6>
                                <span class="text-primary small pt-1 fw-bold">Rupiah</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End uang masuk Card -->
            <!-- uang keluar Card -->
            <div class="col-xxl-6 col-md-6">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Uang Keluar</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bx bx-arrow-from-bottom"></i>
                            </div>
                            <div class="ps-3">
                                <?php if ($uang_keluar['uang_keluar'] == '') {
                                    $jml_uKeluar = 0;
                                } else {
                                    $jml_uKeluar = $uang_keluar['uang_keluar'];
                                } ?>
                                <h6><?= $jml_uKeluar; ?></h6>
                                <span class="text-primary small pt-1 fw-bold">Rupiah</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End uang keluar Card -->
        </div>
        <div class="pagetitle">
            <h1><?= $title; ?></h1>
        </div><!-- End Page Title -->
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <?= $this->session->flashdata('pesan'); ?>
                <div class="row">
                    <!-- data Transaksi Diproses -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title mb-0">Diproses</h5>
                                <div class="row">
                                    <div class="col d-flex flex-row gap-2 mb-2">
                                        <a href="<?= base_url('user/print_t_diproses/' . $sidebar['id']); ?>" target="_blink" type="button" class="btn btn-sm btn-outline-primary"><i class="fs-5 bi bi-printer"></i> PRINT</a>
                                        <a href="<?= base_url('user/pdf_t_diproses/' . $sidebar['id']); ?>" target="_blink" type="button" class="btn btn-sm btn-outline-danger"><i class="fs-5 bi bi-file-earmark-pdf"></i> PDF</a>
                                        <a href="<?= base_url('user/excel_t_diproses/' . $sidebar['id']); ?>" target="_blink" type="button" class="btn btn-sm btn-outline-success"><i class="fs-5 bi bi-file-earmark-excel"></i> EXCEL</a>
                                    </div>
                                </div>
                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Jenis Transaksi</th>
                                            <th scope="col">Metode Pembayaran</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($transaksi_proses as $t_proses) : ?>
                                            <tr>
                                                <th scope="row"><?= $i++; ?></a></th>
                                                <td><?= $t_proses['jenis_transaksi']; ?></td>
                                                <td><?= $t_proses['metode_pembayaran']; ?></td>
                                                <td><?= date('d/m/Y - G:i', $t_proses['tanggal']); ?></td>
                                                <td><a href="<?= base_url('user/detailRiwayat/' . $t_proses['id_transaksi']) ?>" rel="noopener noreferrer">Lihat Detail</a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- End proses -->
                </div>
                <div class="row">
                    <!-- data Transaksi Ditolak -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">Diterima</h5>
                                <div class="row">
                                    <div class="col d-flex flex-row gap-2 mb-2">
                                        <a href="<?= base_url('user/print_t_diterima/' . $sidebar['id']); ?>" target="_blink" type="button" class="btn btn-sm btn-outline-primary"><i class="fs-5 bi bi-printer"></i> PRINT</a>
                                        <a href="<?= base_url('user/pdf_t_diterima/' . $sidebar['id']); ?>" target="_blink" type="button" class="btn btn-sm btn-outline-danger"><i class="fs-5 bi bi-file-earmark-pdf"></i> PDF</a>
                                        <a href="<?= base_url('user/excel_t_diterima/' . $sidebar['id']); ?>" target="_blink" type="button" class="btn btn-sm btn-outline-success"><i class="fs-5 bi bi-file-earmark-excel"></i> EXCEL</a>
                                    </div>
                                </div>
                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Jenis Transaksi</th>
                                            <th scope="col">Metode Pembayaran</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($transaksi_terima as $t_terima) : ?>
                                            <tr>
                                                <th scope="row"><?= $i++; ?></a></th>
                                                <td><?= $t_terima['jenis_transaksi']; ?></td>
                                                <td><?= $t_terima['metode_pembayaran']; ?></td>
                                                <td><?= date('d/m/Y - G:i', $t_terima['tanggal']); ?></td>
                                                <td><a href="<?= base_url('user/detailRiwayat/' . $t_terima['id_transaksi']) ?>" rel="noopener noreferrer">Lihat Detail</a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- End diterima -->
                </div>
                <div class="row">
                    <!-- data Transaksi Ditolak -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">Ditolak</h5>
                                <div class="row">
                                    <div class="col d-flex flex-row gap-2 mb-2">
                                        <a href="<?= base_url('user/print_t_ditolak/' . $sidebar['id']); ?>" target="_blink" type="button" class="btn btn-sm btn-outline-primary"><i class="fs-5 bi bi-printer"></i> PRINT</a>
                                        <a href="<?= base_url('user/pdf_t_ditolak/' . $sidebar['id']); ?>" target="_blink" type="button" class="btn btn-sm btn-outline-danger"><i class="fs-5 bi bi-file-earmark-pdf"></i> PDF</a>
                                        <a href="<?= base_url('user/excel_t_ditolak/' . $sidebar['id']); ?>" target="_blink" type="button" class="btn btn-sm btn-outline-success"><i class="fs-5 bi bi-file-earmark-excel"></i> EXCEL</a>
                                    </div>
                                </div>
                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Jenis Transaksi</th>
                                            <th scope="col">Metode Pembayaran</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($transaksi_tolak as $t_tolak) : ?>
                                            <tr>
                                                <th scope="row"><?= $i++; ?></a></th>
                                                <td><?= $t_tolak['jenis_transaksi']; ?></td>
                                                <td><?= $t_tolak['metode_pembayaran']; ?></td>
                                                <td><?= date('d/m/Y - G:i', $t_tolak['tanggal']); ?></td>
                                                <td><a href="<?= base_url('user/detailRiwayat/' . $t_tolak['id_transaksi']) ?>" rel="noopener noreferrer">Lihat Detail</a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- End diterima -->
                </div>
            </div><!-- End Left side columns -->

        </div>
    </section>

</main><!-- End #main -->