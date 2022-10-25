<?= $this->extend('templates/layout') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-md-12">
        <a href="/barang/tambah" class="btn btn-primary mb-3"><i class="fa-solid fa-square-plus"></i> Tambah Barang</a>
        <a href="/barang/bulk-input" class="btn btn-info mb-3"><i class="fa-solid fa-copy"></i> Bulk Input</a>
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
                                <input name="keyword" type="search" class="form-control" placeholder="Cari disini" value="<?= $keyword ?>">
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
                                <th style="width:20px ;">Kode </th>
                                <th>Nama</th>
                                <th>Lokasi/Ruangan</th>
                                <th>Unit</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($barang as $brg) : ?>
                                <tr>
                                    <td class="text-center"><?= $i++; ?></td>
                                    <td><?= $brg['kode_barang'] ?></td>
                                    <td><?= $brg['nama_barang'] ?></td>
                                    <td><?= $brg['lokasi_barang'] ?></td>
                                    <td><?= $brg['unit_barang'] ?></td>
                                    <td style="width: 150px ;" class="text-center">
                                        <a href="/barang/detail/<?= $brg['kode_barang'] ?>?keyword=<?= $keyword ?>&redirect_page=<?= $redirect ?>" class="btn btn-info btn-sm mb-2"><i class="fa-solid fa-eye"></i></a>
                                        <a href="/barang/edit/<?= $brg['kode_barang'] ?>?keyword=<?= $keyword ?>&redirect_page=<?= $redirect ?>" class="btn btn-primary btn-sm mb-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a onclick="return confirm('Apakah anda yakin ingin menghapus item ini?');" href="/barang/hapus/<?= $brg['kode_barang'] ?>?keyword=<?= $keyword ?>&redirect_page=<?= $redirect ?>" class="btn btn-danger btn-sm mb-2"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>



                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <?= $pager->links('barang') ?>
            </div>
        </div>
        <!-- /.card -->


    </div>

</div>
<?= $this->endSection() ?>