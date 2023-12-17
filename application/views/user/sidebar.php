<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('user'); ?>">
                <i class="bi bi-grid fs-3"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-heading">Transaksi</li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('user/setoran/' . $sidebar['id']); ?>">
                <i class="bi bi-cash-coin fs-3"></i>
                <span>Setoran</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('user/penarikan/' . $sidebar['id']); ?>">
                <i class="ri ri-currency-fill fs-3"></i>
                <span>Penarikan</span>
            </a>
        </li>

        <li class="nav-heading">Riwayat</li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('user/riwayat/' . $sidebar['id']); ?>">
                <i class="ri ri-history-line fs-3"></i>
                <span>Riwayat</span>
            </a>
        </li>
    </ul>

</aside><!-- End Sidebar-->