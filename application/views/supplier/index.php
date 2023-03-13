    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-between">
            <h3>Daftar Supplier</h3>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSupplier">
                <i class="fa-solid fa-plus me-1"></i>
                Tambah Supplier
            </button>
        </div>
        <hr>
        <?= $this->session->flashdata('message') ?>

        <div class="table-responsive rounded">
            <table class="table table-striped table-bordered table-hover table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Supplier</th>
                        <th scope="col">No Telepon</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 0;
                    foreach ($supplier as $sl) :
                        $count++;
                    ?>
                        <tr>
                            <th scope="row"><?= $count ?></th>
                            <td><?= $sl['nama_supplier'] ?></td>
                            <td><?= $sl['no_telepon'] ?></td>
                            <td><?= $sl['alamat'] ?></td>
                            <td>
                                <a href="<?= base_url('supplier/edit/') . $sl['id_supplier'] ?>" class="badge text-bg-success mr-2">
                                    <i class="fas fa-edit"></i>
                                    Ubah
                                </a>
                                <a class="badge text-bg-danger hapus" data-href="<?= base_url('supplier/delete/' . $sl['id_supplier']); ?>" data-id="<?= $sl['id_supplier'] ?>" data-supplier="<?= $sl['nama_supplier'] ?>" data-telepon="<?= $sl['no_telepon'] ?>" data-alamat="<?= $sl['alamat'] ?>">
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
    <div class="modal fade" id="modalSupplier" tabindex="-1" aria-labelledby="modalSupplierLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalSupplierLabel">Tambah Supplier</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="<?= base_url('supplier/create') ?>" method="POST">
                    <div class="modal-body">

                        <div class="">
                            <label for="nama_supplier" id="nama_supplier" class="form-label">Nama Supplier</label>
                            <input type="text" name="nama_supplier" class="form-control" id="nama_supplier" placeholder="Nama Supplier">
                        </div>

                        <div class="mt-3">
                            <label for="no_telepon" id="no_telepon" class="form-label">No Telepon</label>
                            <input type="text" name="no_telepon" class="form-control" id="no_telepon" placeholder="No Telepon">
                        </div>

                        <div class="mt-3">
                            <label for="alamat" id="alamat" class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-close"></i> Batal</button>
                        <button type="submit" class="btn btn-primary" name="supplier"><i class="fas fa-plus"></i> Tambah Supplier</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        const hapusSupplier = document.querySelectorAll('.hapus')
        hapusSupplier.forEach((hapus) => {
            hapus.addEventListener('click', () => {
                const supplier = hapus.dataset.supplier;
                const telepon = hapus.dataset.telepon;
                const alamat = hapus.dataset.alamat;

                Swal.fire({
                    icon: 'warning',
                    html: `Apakah anda yakin ingin menghapus: <br>
                    Nama Supplier: <b>${supplier}</b><br>
                    Telepon: <b>${telepon}</b><br>
                    Alamat: <b>${alamat}</b><br>
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