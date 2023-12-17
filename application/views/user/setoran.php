<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title; ?></h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-7">
                <?= $this->session->flashdata('pesan'); ?>
                <!-- Top Selling -->
                <div class="col-12">
                    <div class="card top-selling overflow-auto">
                        <div class="card-body pb-0">
                            <h5 class="card-title">Form Setoran</h5>
                            <!-- Floating Labels Form -->
                            <form class="row g-3" method="POST" enctype="multipart/form-data" action="<?= base_url('user/setoran/' . $sidebar['id']); ?>">
                                <input type="hidden" name="id_user" value="<?= $sidebar['id']; ?>">
                                <input type="hidden" name="id_tabungan" value="<?= $tabungan['id_tabungan']; ?>">
                                <input type="hidden" name="saldo" value="<?= $tabungan['saldo']; ?>">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" id="floatingName" placeholder="Nominal" name="nominal">
                                            <label for="floatingName">Nominal</label>
                                        </div>
                                    </div>
                                    <?= form_error('nominal', '<small class="text-danger ps-3">', '</small>'); ?>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName" placeholder="Catatan" name="catatan">
                                            <label for="floatingName">Catatan</label>
                                        </div>
                                    </div>
                                    <?= form_error('catatan', '<small class="text-danger ps-3">', '</small>'); ?>
                                </div>
                                <div class="row mt-2">
                                    <label class="col-sm-4 col-form-label">Metode Pembayaran</label>
                                    <div class="col">
                                        <select class="form-select" aria-label="Default select example" name="metode_pembayaran">
                                            <option selected>Open this select menu</option>
                                            <option value="Di tempat">Di tempat</option>
                                            <option value="Dana">Dana</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <label class="col-sm-4 col-form-label">Bukti Transfer</label>
                                    <input class="col" type="file" name="bukti">
                                </div>


                                <div class="text-center mb-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form><!-- End floating Labels Form -->

                        </div>

                    </div>
                </div><!-- End Top Selling -->
            </div><!-- End Left side columns -->
            <div class="col">
                <!-- Saldo Card -->
                <div class="col">
                    <div class="card info-card sales-card">
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
                <div class="col">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Akun Dana Admin</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bx bx-phone"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>082314717069</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Saldo Card -->
            </div>

        </div>
    </section>

</main><!-- End #main -->