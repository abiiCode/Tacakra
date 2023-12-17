<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title; ?></h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-10">
                <!-- Top Selling -->
                <div class="col-12">
                    <div class="card top-selling overflow-auto">
                        <div class="card-body pb-0">
                            <h5 class="card-title">Form Tambah Warga</h5>

                            <!-- Floating Labels Form -->
                            <form class="row g-3" method="POST" action="<?= base_url('admin/tambahWarga'); ?>">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" id="floatingName" placeholder="Nomor KK" name="no_kk">
                                            <label for="floatingName">Nomor KK</label>
                                        </div>
                                    </div>
                                    <?= form_error('no_kk', '<small class="text-danger ps-3">', '</small>'); ?>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName" placeholder="Nama" name="nama">
                                            <label for="floatingName">Nama</label>
                                        </div>
                                    </div>
                                    <?= form_error('nama', '<small class="text-danger ps-3">', '</small>'); ?>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingName" placeholder="Nama" name="no_telepon">
                                            <label for="floatingName">No Telepon</label>
                                        </div>
                                    </div>
                                    <?= form_error('no_telepon', '<small class="text-danger ps-3">', '</small>'); ?>
                                </div>
                                <div class="row mt-2">
                                    <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="Laki-laki" checked>
                                            <label class="form-check-label" for="jenis_kelamin1">
                                                Laki-Laki
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="Perempuan">
                                            <label class="form-check-label" for="jenis_kelamin2">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <label class="col-sm-2 col-form-label">Komplek</label>
                                    <div class="col-sm-5">
                                        <select class="form-select" name="komplek" multiple aria-label="multiple select example">
                                            <option selected disabled>Pilih komplek</option>
                                            <?php $alfabet = ['1A', '2B', '3C']; ?>
                                                <?php foreach ($alfabet as $a) : ?>
                                                    <option value="<?=  $a; ?>"><?= $a; ?></option>
                                                <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <label class="col-sm-2 col-form-label">Tahun Masuk</label>
                                    <div class="col-sm-5">
                                        <select class="form-select" name="tahun_masuk" multiple aria-label="multiple select example">
                                            <option selected disabled>Pilih Tahun Masuk</option>
                                            <?php $i = 2023; ?>
                                            <?php for ($i; $i >= 2016; $i--) : ?>
                                                <option value="<?= $i; ?>"><?= $i; ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
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

        </div>
    </section>

</main><!-- End #main -->