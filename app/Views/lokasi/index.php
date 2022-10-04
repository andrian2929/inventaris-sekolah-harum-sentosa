<?= $this->extend('templates/layout') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-md-12">
        <a href="/lokasi/tambah" class="btn btn-primary mb-3"><i class="fa-solid fa-square-plus"></i> Tambah</a>

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
                                <input name="keyword" type="search" class="form-control" placeholder="Cari berdasarkan nama" value="<?= $keyword ?>">
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
                                <th>Nama Lokasi</th>
                                <th>Nama Unit</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($lokasis as $lokasi) : ?>
                                <tr>
                                    <td class="text-center"><?= $i++; ?></td>
                                    <td><?= $lokasi['nama_lokasi'] ?></td>
                                    <td><?= $lokasi['nama_unit'] ?></td>
                                    <td style="width: 150px ;" class="text-center">
                                        <a href="/lokasi/edit/<?= $lokasi['id'] ?>" class="btn btn-primary btn-sm mb-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a onclick="return confirm('Apakah anda yakin ingin menghapus item ini?');" href="/lokasi/hapus/<?= $lokasi['id'] ?>" class="btn btn-danger btn-sm mb-2"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>



    </div>

</div>
<?= $this->endSection() ?>