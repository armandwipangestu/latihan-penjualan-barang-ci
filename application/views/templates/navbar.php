<!-- Start Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url("admin") ?>">
            <img src="<?= base_url('assets') ?>/img/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            Penjualan Barang
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="nav navbar-nav ms-auto w-100 justify-content-end me-5">
                <a href="<?= base_url("transaksi") ?>" class="nav-link">
                    <i class="fa-solid fa-money-bill me-1"></i>
                    Transaksi
                </a>

                <a href="<?= base_url("supplier"); ?>" class="nav-link">
                    <i class="fa-solid fa-boxes-packing me-1"></i>
                    Supplier
                </a>

                <a href="<?= base_url("barang"); ?>" class="nav-link">
                    <i class="fa-solid fa-cubes me-1"></i>
                    Barang
                </a>

                <a href="<?= base_url("pembeli"); ?>" class="nav-link">
                    <i class="fa-solid fa-users me-1"></i>
                    Pembeli
                </a>

                <a href="<?= base_url("pembayaran"); ?>" class="nav-link">
                    <i class="fa-solid fa-cart-shopping me-1"></i>
                    Pembayaran
                </a>

                <li class="nav-item dropdown mt-2">
                    <a class="dropdown-toggle text-dark" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none;">
                        <i class="fa-solid fa-user me-1"></i>
                        <?= $user['user_name']; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarScrollingDropdown">
                </li>
                <li>
                    <a class="dropdown-item logout" href="auth/logout" id="logout">
                        <i class="fas fa-sign-out-alt"></i> Keluar
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->