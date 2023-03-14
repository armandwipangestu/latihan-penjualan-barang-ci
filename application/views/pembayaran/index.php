    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-between">
            <h3>Daftar Pembayaran</h3>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPembayaran">
                <i class="fa-solid fa-plus me-1"></i>
                Tambah Pembayaran
            </button>
        </div>
        <hr>
        <?= $this->session->flashdata('message') ?>

        <div class="table-responsive rounded">
            <table class="table table-striped table-bordered table-hover table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tanggal Bayar</th>
                        <th scope="col">Total Bayar</th>
                        <th scope="col">ID Transaksi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 0;
                    foreach ($pembayaran as $py) :
                        $count++;
                    ?>
                        <tr>
                            <th scope="row"><?= $count ?></th>
                            <td><?= $py['tanggal_bayar'] ?></td>
                            <td><?= $py['total_bayar'] ?></td>
                            <td><?= $py['id_transaksi'] ?></td>
                            <td>
                                <a href="<?= base_url('pembayaran/edit/') . $py['id_pembayaran'] ?>" class="badge text-bg-success mr-2">
                                    <i class="fas fa-edit"></i>
                                    Ubah
                                </a>
                                <a class="badge text-bg-danger hapus" data-href="<?= base_url('pembayaran/delete/' . $py['id_pembayaran']); ?>" data-id="<?= $py['id_pembayaran'] ?>" data-tanggal="<?= $py['tanggal_bayar'] ?>" data-total="<?= $py['total_bayar'] ?>" data-transaksi="<?= $py['id_transaksi'] ?>">
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
    <div class="modal fade" id="modalPembayaran" tabindex="-1" aria-labelledby="modalPembayaranLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalPembayaranLabel">Tambah Pembayaran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="<?= base_url('pembayaran/create') ?>" method="POST">
                    <div class="modal-body">

                        <div class="">
                            <label for="tanggal_bayar" id="tanggal_bayar" class="form-label">Tanggal Bayar</label>
                            <input type="date" name="tanggal_bayar" class="form-control" id="tanggal_bayar">
                        </div>

                        <div class="mt-3">
                            <label for="total_bayar" id="total_bayar" class="form-label">Total Bayar</label>
                            <input type="text" name="total_bayar" class="form-control" id="total_bayar" placeholder="Total Bayar">
                        </div>

                        <div class="mt-3">
                            <label for="transaksi" id="transaksi" class="form-label">ID Transaksi</label>
                            <select name="transaksi" id="transaksi" class="form-select">
                                <option value="" selected>Pilih Transaksi</option>
                                <?php foreach ($transaksis as $transaksi) : ?>
                                    <option value="<?= $transaksi['id_transaksi'] ?>"><?= $transaksi['id_transaksi'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-close"></i> Batal</button>
                        <button type="submit" class="btn btn-primary" name="pembayaran"><i class="fas fa-plus"></i> Tambah Pembayaran</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        const hapusSupplier = document.querySelectorAll('.hapus')
        hapusSupplier.forEach((hapus) => {
            hapus.addEventListener('click', () => {
                const tanggal = hapus.dataset.tanggal;
                const total = hapus.dataset.total;
                const transaksi = hapus.dataset.transaksi;

                Swal.fire({
                    icon: 'warning',
                    html: `Apakah anda yakin ingin menghapus: <br>
                    Tanggal: <b>${tanggal}</b><br>
                    Total: <b>${total}</b><br>
                    Transaksi: <b>${transaksi}</b><br>
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