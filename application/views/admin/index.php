<main id="main" class="main">
    <!-- Page Title -->
    <div class="pagetitle">
        <h1><?= $title; ?></h1>
    </div><!-- End Page Title -->

    <!-- Dashboard Section -->
    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Warga Card -->
                    <div class="col-xxl-4 col-md-6">
                        <!-- Informasi jumlah kepala keluarga -->
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Kepala Keluarga</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $jmlWarga; ?></h6>
                                        <span class="text-primary small pt-1 fw-bold">Results</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End warga Card -->

                    <!-- Proses Card -->
                    <div class="col-xxl-4 col-md-6">
                        <!-- Informasi jumlah transaksi yang sedang diproses -->
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Permintaan</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bx bxs-hourglass-bottom"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $jmlProses; ?></h6>
                                        <span class="text-primary small pt-1 fw-bold">Transaksi</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Proses Card -->

                    <!-- Laporan Card -->
                    <div class="col-xxl-4 col-md-4">
                         <!-- Tombol untuk mencetak, membuat PDF, dan membuat Excel laporan transaksi yang diproses -->
                        <div class="card info-card sales-card">
                            <div class="card-body mx-auto">
                                <h5 class="card-title">Laporan Transaksi <span class="badge bg-primary text-light">Diproses</span></h5>
                                <div class="row">
                                    <div class="col d-flex flex-row gap-2 mb-2">
                                        <a href="<?= base_url('admin/print_transaksi/Diproses'); ?>" target="_blink" type="button" class="btn btn-sm btn-outline-primary"><i class="fs-5 bi bi-printer"></i> PRINT</a>
                                        <a href="<?= base_url('admin/pdf_transaksi/Diproses'); ?>" target="_blink" type="button" class="btn btn-sm btn-outline-danger"><i class="fs-5 bi bi-file-earmark-pdf"></i> PDF</a>
                                        <a href="<?= base_url('admin/excel_transaksi/Diproses'); ?>" target="_blink" type="button" class="btn btn-sm btn-outline-success"><i class="fs-5 bi bi-file-earmark-excel"></i> EXCEL</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Laporan Card -->

                    <!-- Laporan Card -->
                    <div class="col-xxl-4 col-md-4">
                         <!-- Tombol untuk mencetak, membuat PDF, dan membuat Excel laporan transaksi yang diterima -->
                        <div class="card info-card sales-card">
                            <div class="card-body mx-auto">
                                <h5 class="card-title">Laporan Transaksi <span class="badge bg-success text-light">Diterima</span></h5>
                                <div class="row">
                                    <div class="col d-flex flex-row gap-2 mb-2">
                                        <a href="<?= base_url('admin/print_transaksi/Diterima'); ?>" target="_blink" type="button" class="btn btn-sm btn-outline-primary"><i class="fs-5 bi bi-printer"></i> PRINT</a>
                                        <a href="<?= base_url('admin/pdf_transaksi/Diterima'); ?>" target="_blink" type="button" class="btn btn-sm btn-outline-danger"><i class="fs-5 bi bi-file-earmark-pdf"></i> PDF</a>
                                        <a href="<?= base_url('admin/excel_transaksi/Diterima'); ?>" target="_blink" type="button" class="btn btn-sm btn-outline-success"><i class="fs-5 bi bi-file-earmark-excel"></i> EXCEL</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Laporan Card -->

                    <!-- Laporan Card -->
                    <div class="col-xxl-4 col-md-4">
                        <!-- Tombol untuk mencetak, membuat PDF, dan membuat Excel laporan transaksi yang ditolak -->
                        <div class="card info-card sales-card">
                            <div class="card-body mx-auto">
                                <h5 class="card-title">Laporan Transaksi <span class="badge bg-danger text-light">Ditolak</span></h5>
                                <div class="row">
                                    <div class="col d-flex flex-row gap-2 mb-2">
                                        <a href="<?= base_url('admin/print_transaksi/Ditolak'); ?>" target="_blink" type="button" class="btn btn-sm btn-outline-primary"><i class="fs-5 bi bi-printer"></i> PRINT</a>
                                        <a href="<?= base_url('admin/pdf_transaksi/Ditolak'); ?>" target="_blink" type="button" class="btn btn-sm btn-outline-danger"><i class="fs-5 bi bi-file-earmark-pdf"></i> PDF</a>
                                        <a href="<?= base_url('admin/excel_transaksi/Ditolak'); ?>" target="_blink" type="button" class="btn btn-sm btn-outline-success"><i class="fs-5 bi bi-file-earmark-excel"></i> EXCEL</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Laporan Card -->

                    <!-- User -->
                    <div class="col-12">
                        <!-- Tabel data warga -->
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">Data Warga Rt.003/Rw.005</h5>
                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nomor KK</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Komplek</th>
                                            <th scope="col">Jenis Kelamin</th>
                                            <th scope="col">No Telepon</th>
                                            <th scope="col">Tahun Masuk</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($warga as $w) : ?>
                                            <tr>
                                                <th scope="row"><?= $i++; ?></a></th>
                                                <td><?= $w['no_kk']; ?></td>
                                                <td><?= $w['nama']; ?></td>
                                                <td><?= $w['komplek']; ?></td>
                                                <td><?= $w['jenis_kelamin']; ?></td>
                                                <td><?= $w['no_telepon']; ?></td>
                                                <td><?= $w['tahun_masuk']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- End User -->
                </div>
            </div><!-- End Left side columns -->

        </div>
    </section>

</main><!-- End #main -->