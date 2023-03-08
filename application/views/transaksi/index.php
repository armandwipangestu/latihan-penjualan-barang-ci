    <div class="container mt-5">
        <div class="d-flex justify-content-between">
            <h3>Daftar Transaksi</h3>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTransaksi">
                <i class="fa-solid fa-plus me-1"></i>
                Tambah Transaksi
            </button>
        </div>
        <hr>
        <?= $this->session->flashdata('message') ?>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Barang</th>
                    <th scope="col">Pembeli</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 0;
                foreach ($transaksi as $ts) :
                    $count++;
                ?>
                    <tr>
                        <th scope="row"><?= $count ?></th>
                        <td><?= $ts['nama_barang'] ?></td>
                        <td><?= $ts['nama_pembeli'] ?></td>
                        <td><?= $ts['tanggal'] ?></td>
                        <td><?= $ts['keterangan'] ?></td>
                        <td>
                            <a href="ubah.php?id=<?= $ts['id_transaksi'] ?>" class="badge text-bg-success mr-2">
                                <i class="fas fa-edit"></i>
                                Ubah
                            </a>
                            <a class="badge text-bg-danger hapus" data-id="<?= $ts['id_transaksi'] ?>" data-barang="<?= $ts['nama_barang'] ?>" data-pembeli="<?= $ts['nama_pembeli'] ?>" data-tanggal="<?= $ts['tanggal'] ?>" data-keterangan="<?= $ts['keterangan'] ?>">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalTransaksi" tabindex="-1" aria-labelledby="modalTransaksiLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalTransaksiLabel">Tambah Transaksi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

                <form action="<?= base_url('transaksi') ?>" method="POST">
                    <div class="modal-body">

                        <div class="">
                            <label for="barang" id="barang" class="form-label">Barang</label>
                            <select name="barang" id="barang" class="form-select">
                                <option value="" selected>Pilih Barang</option>
                                <?php foreach($barangs as $barang) : ?>
                                    <option value="<?= $barang['id_barang'] ?>"><?= $barang['nama_barang'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mt-3">
                            <label for="pembeli" id="pembeli" class="form-label">Pembeli</label>
                            <select name="pembeli" id="pembeli" class="form-select">
                                <option value="" selected>Pilih Pembeli</option>
                                <?php foreach($pembelis as $pembeli) : ?>
                                    <option value="<?= $pembeli['id_pembeli'] ?>"><?= $pembeli['nama_pembeli'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mt-3">
                            <label for="tanggal" id="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal">
                        </div>

                        <div class="mt-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-close"></i> Batal</button>
                        <button type="submit" class="btn btn-primary" name="transaksi"><i class="fas fa-plus"></i> Tambah Transaksi</button>
                    </div>
                </form>

            </div>
        </div>
    </div>