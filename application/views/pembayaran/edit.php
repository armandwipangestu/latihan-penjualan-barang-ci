<div class="container mt-5">
    <h3>Ubah Pembayaran</h3>
    <hr>
    <?= $this->session->flashdata('message') ?>

    <div class="row mb-5">
        <div class="col-lg">

            <form method="POST" action="<?= base_url('pembayaran/update'); ?>">
                <div class="row">
                    <div class="col-md-6">

                        <div class="mb-3">
                            <label for="tanggal_bayar" id="tanggal_bayar" class="form-label">Tanggal Bayar</label>
                            <input type="date" name="tanggal_bayar" id="tanggal_bayar" class="form-control" value="<?= $pembayaran['tanggal_bayar']; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="total_bayar" id="total_bayar" class="form-label">Total Bayar</label>
                            <input type="text" class="form-control" id="total_bayar" name="total_bayar" value="<?= $pembayaran['total_bayar'] ?>">
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">
                            <label for="transaksi" id="transaksi" class="form-label">ID Transaksi</label>
                            <select name="transaksi" id="transaksi" class="form-select">
                                <option value="<?= $transaksi['id_transaksi'] ?>" selected><?= $transaksi['id_transaksi'] ?></option>
                                <?php foreach ($transaksis as $ts) : ?>
                                    <?php if ($ts['id_transaksi'] != $transaksi['id_transaksi']) : ?>
                                        <option value="<?= $ts['id_transaksi'] ?>"><?= $ts['id_transaksi'] ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>

                    </div>

                    <input type="hidden" name="id_pembayaran" value="<?= $pembayaran['id_pembayaran']; ?>">

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary" name="ubah_barang">
                            <i class="fa-solid fa-plus me-1"></i>
                            Ubah Pembayaran
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>