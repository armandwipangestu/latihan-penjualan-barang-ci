<div class="container mt-5">
    <h3>Ubah Barang</h3>
    <hr>
    <?= $this->session->flashdata('message') ?>

    <div class="row mb-5">
        <div class="col-lg">

            <form method="POST" action="<?= base_url('barang/update'); ?>">
                <div class="row">
                    <div class="col-md-6">

                        <div class="mb-3">
                            <label for="nama_barang" id="nama_barang" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $barang['nama_barang'] ?>">
                        </div>

                        <div class="mb-3">
                            <label for="harga" id="harga" class="form-label">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" value="<?= $barang['harga'] ?>">
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">
                            <label for="stok" id="stok" class="form-label">Stok</label>
                            <input type="text" class="form-control" id="stok" name="stok" value="<?= $barang['stok'] ?>">
                        </div>

                        <div class="mb-3">
                            <label for="supplier" id="supplier" class="form-label">Nama Supplier</label>
                            <select name="supplier" id="supplier" class="form-select">
                                <option value="<?= $supplier['id_supplier'] ?>" selected><?= $supplier['nama_supplier'] ?></option>
                                <?php foreach ($suppliers as $sp) : ?>
                                    <?php if ($sp['nama_supplier'] != $supplier['nama_supplier']) : ?>
                                        <option value="<?= $sp['id_supplier'] ?>"><?= $sp['nama_supplier'] ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>

                    </div>

                    <input type="hidden" name="id_barang" value="<?= $barang['id_barang']; ?>">

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary" name="ubah_barang">
                            <i class="fa-solid fa-plus me-1"></i>
                            Ubah Barang
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>