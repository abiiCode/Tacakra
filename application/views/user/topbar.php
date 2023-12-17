<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
</style>
<div class="d-flex align-items-center justify-content-between">
    <a href="<?= base_url('user'); ?>" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block fs-2 ms-2" style="font-family: 'Roboto', sans-serif;">TA - CAKRA</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                <img src="<?= base_url('assets/img/user_profile/' . $topbar['image']); ?>" alt="Profile" class="rounded-circle">
                <span class="d-none d-md-block dropdown-toggle ps-2"><?= $topbar['nama']; ?></span>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="<?= base_url('user/profile'); ?>">
                        <i class="bi bi-person"></i>
                        <span>My Profile</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#modalLogout">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Log Out</span>
                    </a>
                </li>

            </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

    </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<div class="modal fade" id="modalLogout" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Yakin Memilih Keluar?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span class="fs-6">Pilih <span class="fw-bold text-primary">Log Out</span> untuk mengakhiri session.</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a type="button" class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Log Out</a>
            </div>
        </div>
    </div>
</div>