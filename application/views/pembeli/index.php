    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-between">
            <h3>Daftar Pembeli</h3>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPembeli">
                <i class="fa-solid fa-plus me-1"></i>
                Tambah Pembeli
            </button>
        </div>
        <hr>
        <?= $this->session->flashdata('message') ?>

        <div class="table-responsive rounded">
            <table class="table table-striped table-bordered table-hover table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Pembeli</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">No Telepon</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 0;
                    foreach ($pembeli as $pb) :
                        $count++;
                    ?>
                        <tr>
                            <th scope="row"><?= $count ?></th>
                            <td><?= $pb['nama_pembeli'] ?></td>
                            <td><?= $pb['jenis_kelamin'] ?></td>
                            <td><?= $pb['no_telepon']; ?></td>
                            <td><?= $pb['alamat'] ?></td>
                            <td>
                                <a href="<?= base_url('pembeli/edit/') . $pb['id_pembeli'] ?>" class="badge text-bg-success mr-2">
                                    <i class="fas fa-edit"></i>
                                    Ubah
                                </a>
                                <a class="badge text-bg-danger hapus" data-href="<?= base_url('pembeli/delete/' . $pb['id_pembeli']); ?>" data-id="<?= $pb['id_pembeli'] ?>" data-pembeli="<?= $pb['nama_pembeli'] ?>" data-jk="<?= $pb['jenis_kelamin'] ?>" data-telepon="<?= $pb['no_telepon']; ?>" data-alamat="<?= $pb['alamat'] ?>">
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
    <div class="modal fade" id="modalPembeli" tabindex="-1" aria-labelledby="modalPembeliLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalPembeliLabel">Tambah Pembeli</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="<?= base_url('pembeli/create') ?>" method="POST">
                    <div class="modal-body">

                        <div class="">
                            <label for="nama_pembeli" id="nama_pembeli" class="form-label">Nama Pembeli</label>
                            <input type="text" name="nama_pembeli" class="form-control" id="nama_pembeli" placeholder="Nama Pembeli">
                        </div>

                        <div class="mt-3">
                            <label for="jenis_kelamin" id="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <input type="text" name="jenis_kelamin" class="form-control" id="jenis_kelamin" placeholder="Jenis Kelamin">
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
                        <button type="submit" class="btn btn-primary" name="pembeli"><i class="fas fa-plus"></i> Tambah Supplier</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        const hapusSupplier = document.querySelectorAll('.hapus')
        hapusSupplier.forEach((hapus) => {
            hapus.addEventListener('click', () => {
                const pembeli = hapus.dataset.pembeli;
                const jk = hapus.dataset.jk;
                const telepon = hapus.dataset.telepon;
                const alamat = hapus.dataset.alamat;

                Swal.fire({
                    icon: 'warning',
                    html: `Apakah anda yakin ingin menghapus: <br>
                    Nama Pembeli: <b>${pembeli}</b><br>
                    Jenis Kelamin: <b>${jk}</b><br>
                    No Telepon: <b>${telepon}</b><br>
                    Alamat: <b>${alamat}</b>
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