<!-- Start Form Login -->
    <div class="d-flex justify-content-center mb-5">
        <div class="mt-5">

            <div class="text-center fs-1">
                <i class="fa fa-boxes"></i>
                <h4 class="pt-3 mb-4">Masuk Penjualan Barang</h4>
            </div>

            <?= $this->session->flashdata('message') ?>

            <form class="rounded pt-2" method="post" action="<?= base_url('auth') ?>">

                <div class="mb-3" style="width: 300px;">
                    <label class="form-label">
                        Petugas
                    </label>
                    <input type="text" name="username" class="form-control" id="username" required autofocus />
                </div>

                <div class="mb-3 password-field input-wrapper">
                    <label class="form-label">Sandi</label>
                    <input type="password" name="password" class="form-control" id="password" />
                </div>

                <div class="mb-3 ">
                    <button class="w-100 btn btn-primary mt-2" type="submit" name="login">
                        Masuk
                    </button>
                </div>
            </form>

        </div>
    </div>
<!-- End Form Login -->