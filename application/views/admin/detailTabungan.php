<main id="main" class="main">

    <!-- Bagian Judul Halaman -->
    <div class="pagetitle">
        <h1><?= $title; ?></h1>
    </div><!-- End Page Title -->

    <!-- Bagian Konten Utama -->
    <section class="section dashboard">
        <div class="row">
            <!-- Bagian Profile Warga -->
            <section class="section profile">
                <div class="row">
                    <!-- Pesan Flash Data -->
                    <?= $this->session->flashdata('pesan'); ?>
                    <!-- Kolom Profil Pengguna -->
                    <div class="col-xl-4">

                        <div class="card">
                            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                                <!-- Gambar Profil -->
                                <img src="<?= base_url('assets/img/user_profile/' . $user['image']); ?>" alt="Profile" class="rounded-circle">
                                <!-- Nama dan Nomor KK Pengguna -->
                                <h2><?= $user['nama']; ?></h2>
                                <h3><?= $user['no_kk']; ?></h3>
                            </div>
                        </div>

                    </div>
                    <!-- Kolom Informasi Profile -->
                    <div class="col-xl-8">

                        <div class="card">
                            <div class="card-body pt-3">
                                <!-- Bordered Tabs (Tab Navigasi ) -->
                                <ul class="nav nav-tabs nav-tabs-bordered">
                                    <li class="nav-item">
                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                                    </li>
                                </ul>
                                <!-- Konten Tab -->
                                <div class="tab-content pt-2">

                                    <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                        <h5 class="card-title">Profile</h5>
                                        <!-- Informasi Detail Profile -->
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                                            <div class="col-lg-9 col-md-8"><?= $user['nama']; ?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Nomor KK</div>
                                            <div class="col-lg-9 col-md-8"><?= $user['no_kk']; ?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">komplek</div>
                                            <div class="col-lg-9 col-md-8"><?= $user['komplek']; ?></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Jenis Kelamin</div>
                                            <div class="col-lg-9 col-md-8"><?= $user['jenis_kelamin']; ?></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">No Telepon</div>
                                            <div class="col-lg-9 col-md-8"><?= $user['no_telepon']; ?></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Tahun Masuk</div>
                                            <div class="col-lg-9 col-md-8"><?= $user['tahun_masuk']; ?></div>
                                        </div>
                                    </div>

                                </div><!-- End Bordered Tabs -->

                            </div>
                        </div>

                    </div>
                </div>
            </section><!-- End Bagian Profile Warga -->

            <!-- Warga Card -->
            <!-- Kartu Informasi Saldo -->
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Saldo</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cash"></i>
                            </div>
                            <div class="ps-3">
                                <h6><?= $saldo['saldo_diterima']; ?></h6>
                                <span class="text-primary small pt-1 fw-bold">Rupiah</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Kartu Informasi Saldo -->

            <!-- saldo masuk Card -->
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">Saldo Masuk</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bx bx-arrow-to-bottom"></i>
                            </div>
                            <div class="ps-3">
                                <?php if ($saldo_masuk['saldo_masuk'] == '') {
                                    $jml_sMasuk = 0;
                                } else {
                                    $jml_sMasuk = $saldo_masuk['saldo_masuk'];
                                } ?>
                                <h6><?= $jml_sMasuk; ?></h6>
                                <span class="text-primary small pt-1 fw-bold">Rupiah</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End saldo masuk Card -->

            <!-- saldo keluar Card -->
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Saldo Keluar</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bx bx-arrow-from-bottom"></i>
                            </div>
                            <div class="ps-3">
                                <?php if ($saldo_keluar['saldo_keluar'] == '') {
                                    $jml_sKeluar = 0;
                                } else {
                                    $jml_sKeluar = $saldo_keluar['saldo_keluar'];
                                } ?>
                                <h6><?= $jml_sKeluar; ?></h6>
                                <span class="text-primary small pt-1 fw-bold">Rupiah</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End saldo keluar Card -->

              <!-- Kolom Transaksi Warga -->
            <div class="col-lg-12">
                <div class="row">
                     <!-- Tabel Data Transaksi -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">Transaksi</h5>
                                <!-- Tabel Data Transaksi -->
                                <!-- <div class="row">
                                    <div class="col d-flex flex-row gap-2 mb-2">
                                        <a href="<?= base_url('admin/print_data_tabungan'); ?>" target="_blank" type="button" class="btn btn-sm btn-outline-primary"><i class="fs-5 bi bi-printer"></i> PRINT</a>
                                        <a href="<?= base_url('admin/pdf_data_tabungan'); ?>" target="_blank" type="button" class="btn btn-sm btn-outline-danger"><i class="fs-5 bi bi-file-earmark-pdf"></i> PDF</a>
                                        <a href="<?= base_url('admin/excel_data_tabungan'); ?>" target="_blink" type="button" class="btn btn-sm btn-outline-success"><i class="fs-5 bi bi-file-earmark-excel"></i> EXCEL</a>
                                    </div>

                                </div> -->
                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nomor KK</th>
                                            <th scope="col">Jenis Transaksi</th>
                                            <th scope="col">Nominal</th>
                                            <th scope="col">Metode Pembayaran</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Catatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($tabungan as $tab) : ?>
                                            <tr>
                                                <th scope="row"><?= $i++; ?></a></th>
                                                <td><?= $tab['no_kk']; ?></td>
                                                <td><?= $tab['jenis_transaksi']; ?></td>
                                                <td><?= 'Rp. ' . $tab['nominal']; ?></td>
                                                <td><?= $tab['metode_pembayaran']; ?></td>
                                                <td><?= date('d/m/Y', $tab['tanggal']); ?></td>
                                                <td><?= $tab['catatan']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- End User -->
                </div>
            </div><!-- End Kolom Transaksi Warga -->

        </div>
    </section><!-- End Bagian Konten Utama -->

</main><!-- End #main -->