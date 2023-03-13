    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-between">
            <h3>Daftar Barang</h3>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalBarang">
                <i class="fa-solid fa-plus me-1"></i>
                Tambah Barang
            </button>
        </div>
        <hr>
        <?= $this->session->flashdata('message') ?>

        <div class="table-responsive rounded">
            <table class="table table-striped table-bordered table-hover table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Nama Supplier</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 0;
                    foreach ($barang as $br) :
                        $count++;
                    ?>
                        <tr>
                            <th scope="row"><?= $count ?></th>
                            <td><?= $br['nama_barang'] ?></td>
                            <td><?= $br['harga'] ?></td>
                            <td><?= $br['stok'] ?></td>
                            <td><?= $br['nama_supplier'] ?></td>
                            <td>
                                <a href="<?= base_url('barang/edit/') . $br['id_barang'] ?>" class="badge text-bg-success mr-2">
                                    <i class="fas fa-edit"></i>
                                    Ubah
                                </a>
                                <a class="badge text-bg-danger hapus" data-href="<?= base_url('barang/delete/' . $br['id_barang']); ?>" data-id="<?= $br['id_barang'] ?>" data-barang="<?= $br['nama_barang'] ?>" data-harga="<?= $br['harga'] ?>" data-stok="<?= $br['stok'] ?>" data-supplier="<?= $br['nama_supplier']; ?>">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalBarang" tabindex="-1" aria-labelledby="modalBarangLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalBarangLabel">Tambah Barang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="<?= base_url('barang/create') ?>" method="POST">
                    <div class="modal-body">

                        <div class="">
                            <label for="nama_barang" id="nama_barang" class="form-label">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" id="nama_barang" placeholder="Nama Barang">
                        </div>

                        <div class="mt-3">
                            <label for="harga" id="harga" class="form-label">Harga</label>
                            <input type="text" name="harga" class="form-control" id="harga" placeholder="Harga">
                        </div>

                        <div class="mt-3">
                            <label for="stok" id="stok" class="form-label">Stok</label>
                            <input type="text" name="stok" class="form-control" id="stok" placeholder="Stok">
                        </div>

                        <div class="mt-3">
                            <label for="supplier" id="supplier" class="form-label">Nama Supplier</label>
                            <select name="supplier" id="supplier" class="form-select">
                                <option value="" selected>Pilih Supplier</option>
                                <?php foreach ($suppliers as $supplier) : ?>
                                    <option value="<?= $supplier['id_supplier'] ?>"><?= $supplier['nama_supplier'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-close"></i> Batal</button>
                        <button type="submit" class="btn btn-primary" name="barang"><i class="fas fa-plus"></i> Tambah Supplier</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        const hapusSupplier = document.querySelectorAll('.hapus')
        hapusSupplier.forEach((hapus) => {
            hapus.addEventListener('click', () => {
                const barang = hapus.dataset.barang;
                const harga = hapus.dataset.harga;
                const stok = hapus.dataset.stok;
                const supplier = hapus.dataset.supplier;

                Swal.fire({
                    icon: 'warning',
                    html: `Apakah anda yakin ingin menghapus: <br>
                    Nama Barang: <b>${barang}</b><br>
                    Harga: <b>${harga}</b><br>
                    Stok: <b>${stok}</b><br>
                    Supplier: <b>${supplier}</b>
                    `,
                    showCancelButton: true,
                    confirmButtonColor: '#d9534f',
                    cancelButtonColor: '#5cb85c',
                    confirmButtonText: `<i class="fas fa-trash"></i> Ya`,
                    cancelButtonText: `Tidak`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        const linkHref = hapus.dataset.href
                        location.href = `${linkHref}`
                    }
                })
            })
        })
    </script>