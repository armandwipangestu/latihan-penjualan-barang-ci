<div class="container mt-5">
    <h3>Ubah Supplier</h3>
    <hr>
    <?= $this->session->flashdata('message') ?>

    <div class="row mb-5">
        <div class="col-lg">

            <form method="POST" action="<?= base_url('supplier/update'); ?>">
                <div class="row">
                    <div class="col-md-6">

                        <div class="mb-3">
                            <label for="nama_supplier" id="nama_supplier" class="form-label">Nama Supplier</label>
                            <input type="text" name="nama_supplier" class="form-control" id="nama_supplier" placeholder="Nama Supplier" value="<?= $supplier['nama_supplier']; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="no_telepon" id="no_telepon" class="form-label">No Telepon</label>
                            <input type="text" name="no_telepon" class="form-control" id="no_telepon" placeholder="No Telepon" value="<?= $supplier['no_telepon']; ?>">
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">
                            <label for="alamat" id="alamat" class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat" value="<?= $supplier['alamat']; ?>">
                        </div>

                    </div>

                    <input type="hidden" name="id_supplier" value="<?= $supplier['id_supplier']; ?>">

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary" name="ubah_transaksi">
                            <i class="fa-solid fa-plus me-1"></i>
                            Ubah Supplier
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>