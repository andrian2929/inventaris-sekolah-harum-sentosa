<?= $this->extend('templates/layout') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-md-12">
        <a href="/barang/tambah" class="btn btn-primary mb-3"><i class="fa-solid fa-square-plus"></i> Tambah Barang</a>
        <a href="/barang/tambah" class="btn btn-info mb-3"><i class="fa-solid fa-copy"></i> Bulk Input</a>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th style="width: 15px;">No</th>
                                <th style="width:20px ;">Kode </th>
                                <th>Nama</th>
                                <th>Lokasi</th>
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
                                        <a href="/barang/detail/<?= $brg['kode_barang'] ?>" class="btn btn-info btn-sm mb-2"><i class="fa-solid fa-eye"></i></a>
                                        <a href="" class="btn btn-primary btn-sm mb-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="" class="btn btn-danger btn-sm mb-2"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>



                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>
        <!-- /.card -->


    </div>

</div>
<?= $this->endSection() ?>