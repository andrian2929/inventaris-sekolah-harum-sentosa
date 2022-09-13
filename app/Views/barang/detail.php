<?= $this->extend('templates/layout') ?>

<?= $this->section('content') ?>
<div class="card mb-3">
    <div class="row ">
        <div class="col-md-4 mt-3">
            <img class="rounded img-thumbnail" src="/img/barang/<?= $barang['foto_barang'] ?>" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width:150px">Kode</th>
                            <td scope="col"><?= $barang['kode_barang'] ?></td>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th style="width:150px">Nama</th>
                            <td><?= $barang['nama_barang'] ?></td>

                        </tr>

                        <tr>
                            <th style="width:150px">Merek</th>
                            <td><?= $barang['merek_barang'] ?></td>

                        </tr>

                        <tr>
                            <th style="width:150px">Harga</th>
                            <td><?= $barang['harga_barang'] ?></td>

                        </tr>
                        <tr>
                            <th style="width:150px">Kategori</th>
                            <td><?= $barang['kategori_barang'] ?></td>

                        </tr>
                        <tr>
                            <th style="width:150px">Asal Barang</th>
                            <td><?= $barang['asal_barang'] ?></td>

                        </tr>

                        <tr>
                            <th style="width:150px">Lokasi</th>
                            <td><?= $barang['lokasi_barang'] ?></td>

                        </tr>

                        <tr>
                            <th style="width:150px">Unit</th>
                            <td><?= $barang['unit_barang'] ?></td>

                        </tr>

                        <tr>
                            <th style="width:150px">Kondisi</th>
                            <td><?= $barang['kondisi_barang'] ?></td>

                        </tr>

                        <tr>
                            <th style="width:150px">Keterangan</th>
                            <td><?= $barang['keterangan_barang'] ?></td>
                        </tr>

                        <tr>
                            <th style="width:150px">Tanggal Pembukuan</th>
                            <td><?= date('d/m/Y H:i:s', strtotime($barang['tanggal_pembukuan'])) ?></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>