<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <!-- Sidebar Navigation List -->
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('admin'); ?>">
                <i class="bi bi-grid fs-3"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Data Warga Section -->
        <li class="nav-heading">Data Warga</li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('admin/dataWarga'); ?>">
                <i class="bi bi-people fs-3"></i>
                <span>Warga</span>
            </a>
        </li>

        <!-- Data Transaksi Section -->
        <li class="nav-heading">Data Transaksi</li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('admin/dataTransaksi'); ?>">
                <i class="ri ri-hand-coin-line fs-3"></i>
                <span>Transaksi</span>
            </a>
        </li>

        <!-- Data Tabungan Section -->
        <li class="nav-heading">Data Tabungan</li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('admin/dataTabungan'); ?>">
                <i class="bi bi-bank fs-3"></i>
                <span>Tabungan</span>
            </a>
        </li>
    </ul>

</aside><!-- End Sidebar-->