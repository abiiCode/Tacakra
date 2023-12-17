<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                <div class="d-flex flex-column justify-content-center py-2 logo">
                    <a href="<?= base_url('auth'); ?>" class="text-center">
                        <span>TA-CAKRA</span>
                    </a>
                    <br>
                    <h6 class="fs-16 text-center small">Setitik Tabungan, Jejak Keberlanjutan</h6>
                </div><!-- End Logo -->

                <div class="card mb-6">

                    <div class="card-body">

                        <div class="pt-4 pb-2">
                            <p class="text-center small">Masukan No.KK dan Password Untuk Login</p>
                        </div>
                        <?= $this->session->flashdata('pesan'); ?>

                        <form class="row g-3" action="<?= base_url('auth'); ?>" method="POST">

                            <div class="col-12">
                                <label for="yourno_kk" class="form-label"><Nav>No.KK</Nav></label>
                                <input type="text" name="no_kk" class="form-control" id="yournis">
                                <?= form_error('no_kk', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="col-12">
                                <label for="yourPassword" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="yourPassword">
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="col-14">
                                    <button class="btn btn-primary w-100" type="submit">Login</button>
                                </div>
                        </form>

                    </div>
                </div>

                <div class="fs-16 text-center small">
                    CAKRA 03/05
                </div>

            </div>
        </div>
    </div>

</section>