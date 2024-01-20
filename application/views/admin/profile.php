<!-- ======= Main Content ======= -->
<main id="main" class="main">

    <!-- Bagian Judul Halaman -->
    <div class="pagetitle">
        <h1>Profile</h1>
    </div><!-- End Page Title -->

     <!-- Bagian Profil -->
    <section class="section profile">
        <div class="row">
            <?= $this->session->flashdata('pesan'); ?>
            <div class="col-xl-4">

                <!-- Bagian Kartu Profil -->
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="<?= base_url('assets/img/user_profile/' . $user['image']); ?>" alt="Profile" class="rounded-circle">
                        <h3><?= $user['nama']; ?></h3>
                    </div>
                </div>

            </div>

            <!-- Bagian Detail Profil dan Edit -->
            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Tab Berbatas untuk Overview Profil dan Edit -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                            </li>

                        </ul>
                        <!-- Konten Tab untuk Overview Profil dan Edit -->
                        <div class="tab-content pt-2">

                            <!-- Tab Overview Profil -->
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nama</div>
                                    <div class="col-lg-9 col-md-8"><?= $user['nama']; ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Role</div>
                                    <div class="col-lg-9 col-md-8">Admin</div>
                                </div>

                            </div>

                            <!-- Tab Edit Profil -->
                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <form method="POST" action="<?= base_url('admin/profile'); ?>">
                                    <!-- Form Edit Profil -->
                                    <div class="row mb-3">
                                         <!-- Input Field Tersembunyi -->
                                        <input type="hidden" name="id" value="<?= $user['id']; ?>">
                                        <input type="hidden" name="is_active" value="<?= $user['is_active']; ?>">
                                        <input type="hidden" name="password" value="<?= $user['password']; ?>">
                                        <input type="hidden" name="image" value="<?= $user['image']; ?>">
                                        <input type="hidden" name="date_created" value="<?= $user['date_created']; ?>">
                                        <input type="hidden" name="no_kk" value="<?= $user['no_kk']; ?>">
                                        <input type="hidden" name="role_id" value="<?= $user['role_id']; ?>">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="nama" type="text" class="form-control" id="nama" value="<?= $user['nama']; ?>">
                                            <?= form_error('nama', '<small class="text-danger ps-3">', '</small>'); ?>
                                        </div>
                                    </div>

                                    <!-- Tombol Simpan Perubahan -->
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Modal untuk Mengedit Gambar Profil -->
    <div class="modal fade" id="modalEditImg" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Foto Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Isi Modal dengan Form Edit Gambar Profil -->
                <form method="POST" action="<?= base_url('admin/edit_profile_img'); ?>">
                    <div class="modal-body">
                        <div class="row mb-3">
                             <!-- Input Field Tersembunyi -->
                            <input type="hidden" name="id" value="<?= $user['id']; ?>">
                            <input type="hidden" name="is_active" value="<?= $user['is_active']; ?>">
                            <input type="hidden" name="password" value="<?= $user['password']; ?>">
                            <input type="hidden" name="date_created" value="<?= $user['date_created']; ?>">
                            <input type="hidden" name="email" value="<?= $user['email']; ?>">
                            <input type="hidden" name="role_id" value="<?= $user['role_id']; ?>">
                            <input type="hidden" name="nama" value="<?= $user['nama']; ?>">
                            <div class="col-lg-11">
                                <input name="image" type="file">
                            </div>
                        </div>
                    </div>

                    <!-- Footer Modal dengan Tombol Batal dan Simpan -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form><!-- End Profile Edit Form -->
            </div>
        </div>
    </div>

</main><!-- End #main -->