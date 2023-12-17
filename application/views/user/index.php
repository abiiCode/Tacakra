<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title; ?></h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <div class="row">
                    <!-- Saldo Card -->
                    <div class="col-xxl-6 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Saldo Anda</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cash"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $tabungan['saldo']; ?></h6>
                                        <span class="text-primary small pt-1 fw-bold">Rupiah</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Saldo Card -->
                    <!-- Saldo Card -->
                    <div class="col-xxl-6 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Transaksi</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bx bxs-hourglass-top"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $jml_ptransaksi; ?></h6>
                                        <span class="text-primary small pt-1 fw-bold">Sedang Diproses</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Saldo Card -->
                    <!-- User -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">Transaksi Diproses</h5>
                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Jenis Transaksi</th>
                                            <th scope="col">Metode Pembayaran</th>
                                            <th scope="col">Nominal</th>
                                            <th scope="col">Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($transaksi as $t) : ?>
                                            <tr>
                                                <th scope="row"><?= $i++; ?></a></th>
                                                <td><?= $t['jenis_transaksi']; ?></td>
                                                <td><?= $t['metode_pembayaran']; ?></td>
                                                <td><?= $t['nominal']; ?></td>
                                                <td><?= date('d/m/Y - G:i', $t['tanggal']); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- End User -->
                </div>
            <div><!--End Left side columd-->