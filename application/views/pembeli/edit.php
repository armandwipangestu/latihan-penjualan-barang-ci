<div class="container mt-5">
    <h3>Ubah Pembeli</h3>
    <hr>
    <?= $this->session->flashdata('message') ?>

    <div class="row mb-5">
        <div class="col-lg">

            <form method="POST" action="<?= base_url('pembeli/update'); ?>">
                <div class="row">
                    <div class="col-md-6">

                        <div class="mb-3">
                            <label for="nama_pembeli" id="nama_pembeli" class="form-label">Nama Pembeli</label>
                            <input type="text" name="nama_pembeli" class="form-control" id="nama_pembeli" placeholder="Nama Pembeli" value="<?= $pembeli['nama_pembeli']; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="jenis_kelamin" id="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <input type="text" name="jenis_kelamin" class="form-control" id="jenis_kelamin" placeholder="Jenis Kelamin" value="<?= $pembeli['jenis_kelamin']; ?>">
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">
                            <label for="no_telepon" id="no_telepon" class="form-label">No Telepon</label>
                            <input type="text" name="no_telepon" class="form-control" id="no_telepon" placeholder="No Telepon" value="<?= $pembeli['no_telepon']; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="alamat" id="alamat" class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat" value="<?= $pembeli['alamat']; ?>">
                        </div>

                    </div>

                    <input type="hidden" name="id_pembeli" value="<?= $pembeli['id_pembeli']; ?>">

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary" name="ubah_pembeli">
                            <i class="fa-solid fa-plus me-1"></i>
                            Ubah Pembeli
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>