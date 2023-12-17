<style>
    img {
        width: max-content;
        height: auto;
    }
</style>
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
                    <div class="card pb-4 top-selling overflow-auto">
                        <div class="card-body pb-0">
                            <h5 class="card-title">Transaksi <?= $transaksi['jenis_transaksi']; ?></h5>
                            <!-- Floating Labels Form -->
                            <div class="row">
                                <div class="col-md-6 g-1">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="floatingName" placeholder="ID Transaksi" value="<?= $transaksi['id_transaksi']; ?>" disabled>
                                        <label for="floatingName">ID Transaksi</label>
                                    </div>
                                </div>
                                <div class="col-md-6 g-1">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="Nama" value="<?= $warga['nama']; ?>" disabled>
                                        <label for="floatingName">Nama</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-6 g-1">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="No Telepon" value="<?= $warga['no_telepon']; ?>" disabled>
                                        <label for="floatingName">No Telepon</label>
                                    </div>
                                </div>
                                <div class="col-md-6 g-1">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="Jenis Transaksi" value="<?= $transaksi['jenis_transaksi']; ?>" disabled>
                                        <label for="floatingName">Jenis Transaksi</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-6 g-1">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="floatingName" placeholder="Nominal" value="<?= $transaksi['nominal']; ?>" disabled>
                                        <label for="floatingName">Nominal</label>
                                    </div>
                                </div>
                                <div class="col-md-6 g-1">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="Catatan" value="<?= $transaksi['catatan']; ?>" disabled>
                                        <label for="floatingName">Catatan</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-6 g-1">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="Metode Pembayaran" value="<?= $transaksi['metode_pembayaran']; ?>" disabled>
                                        <label for="floatingName">Metode Pembayaran</label>
                                    </div>
                                </div>
                                <div class="col-md-6 g-1">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingName" placeholder="Tanggal" value="<?= date('d/F/Y - G:i:s', $transaksi['tanggal']); ?>" disabled>
                                        <label for="floatingName">Tanggal</label>
                                    </div>
                                </div>
                            </div>

                            <?php if ($transaksi['bukti'] == '') { ?>
                                <div class="row mt-2">
                                    <div class="col-md-6 g-1 ms-1">
                                        <label class="col-sm-4">Bukti Transfer</label>
                                        <div class="col-6">
                                            <p class="text-primary fw-bold">Kosong</p>
                                        </div>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="row mt-2">
                                    <div class="col-md-6 g-1 ms-1">
                                        <label class="col-sm-4">Bukti Transfer</label>
                                        <div class="col-6">
                                            <a href="<?= base_url('uploads/bukti/' . $transaksi['bukti']); ?>" target="_blank" class="btn btn-primary btn-sm">
                                                Klik disini!
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div><!-- End Top Selling -->
            </div><!-- End Left side columns -->
        </div>
    </section>

</main><!-- End #main -->