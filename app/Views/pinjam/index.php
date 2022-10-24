<?= $this->extend('templates/layout') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-md-12">
        <a href="/pinjam/tambah" class="btn btn-primary mb-3"><i class="fa-solid fa-square-plus"></i> Tambah Pinjam</a>
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success mb-3" role="alert">
                <?= session()->getFlashdata('pesan') ?>
            </div>
        <?php endif; ?>
        <div class="card">

            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-md-8">
                        <form action="" method="get">
                            <div class="input-group">
                                <input name="keyword" type="search" class="form-control" placeholder="Cari berdasarkan kode, nama peminjam, dan barang" value="<?= $keyword ?>">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th style="width: 15px;">No</th>
                                <th style="width:20px ;">Kode Pinjam </th>
                                <th>Nama Peminjam</th>
                                <th>Nama Barang</th>
                                <th>Tanggal Pinjam</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pinjams as $pinjam) : ?>
                                <tr>
                                    <td class="text-center"><?= $i++; ?></td>
                                    <td><?= $pinjam['kode_pinjam'] ?></td>
                                    <td><?= $pinjam['nama_peminjam'] ?></td>
                                    <td><?= ($pinjam['nama_barang'] != null) ? $pinjam['nama_barang'] : '<em>Barang telah dihapus</em>' ?></td>
                                    <td class="text-center"><?= $pinjam['tanggal_pinjam'] ?></td>
                                    <td class="text-center">
                                        <?php
                                        if ($pinjam['is_returned'] == '0') {
                                        ?>
                                            <a href="/pinjam/return/<?= $pinjam['id'] ?>" class="btn btn-sm btn-info"><i class="fa-solid fa-arrow-rotate-left"></i></a>
                                        <?php
                                        } else if ($pinjam['is_returned'] == '1') {
                                        ?>
                                            Telah dikembalikan
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td style="width: 150px ;" class="text-center">
                                        <a href="/pinjam/detail/<?= $pinjam['kode_pinjam'] ?>" class="btn btn-info btn-sm mb-2"><i class="fa-solid fa-eye"></i></a>

                                        <?php if (!$pinjam['is_returned']) : ?>
                                            <a href="/pinjam/edit/<?= $pinjam['kode_pinjam'] ?>" class="btn btn-primary btn-sm mb-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <?php endif; ?>

                                        <a onclick="return confirm('Apakah anda yakin ingin menghapus item ini?');" href="/pinjam/hapus/<?= $pinjam['kode_pinjam'] ?>" class="btn btn-danger btn-sm mb-2"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <?= $pager->links('pinjam') ?>
            </div>
        </div>
        <!-- /.card -->


    </div>

</div>
<?= $this->endSection() ?>