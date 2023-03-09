<div class="container mt-5">
    <h3>Ubah Transaksi</h3>
    <hr>

    <div class="row">
        <div class="col-lg">

            <form method="POST" action="">
                <div class="row">
                    <div class="col-md-6">

                        <div class="mb-3">
                            <label for="barang" id="barang" class="form-label">Barang</label>
                            <select name="barang" id="barang" class="form-select">
                                <option value="<?= $barang['id_barang'] ?>" selected><?= $barang['nama_barang'] ?></option>
                                <?php foreach($barangs as $br) : ?>
                                    <?php if($br['nama_barang'] != $barang['nama_barang']) : ?>
                                        <option value="<?= $br['id_barang'] ?>"><?= $br['nama_barang'] ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="pembeli" class="form-label">Pembeli</label>
                            <select name="pembeli" id="pembeli" class="form-select">
                                <option value="<?= $pembeli['id_pembeli'] ?>" selected><?= $pembeli['nama_pembeli'] ?></option>
                                <?php foreach($pembelis as $pb) : ?>
                                    <?php if($pb['nama_pembeli'] != $pembeli['nama_pembeli']) : ?>
                                        <option value="<?= $pb['id_pembeli'] ?>"><?= $pb['nama_pembeli'] ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        </div>

                        <div class="col-md-6">

                        <div class="mb-3">
                            <label for="tanggal" id="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $transaksi['tanggal'] ?>">
                        </div>

                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $transaksi['keterangan'] ?>">
                        </div>

                    </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary" name="ubah_transaksi">
                                <i class="fa-solid fa-plus me-1"></i>
                                Ubah Transaksi
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>