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

                    <tr>
                        <td style="width:150px"><b>Kode</b></td>
                        <td scope="col"><?= $barang['kode_barang'] ?></td>

                    </tr>


                    <tr>
                        <td style="width:150px"><b>Nama</b></td>
                        <td><?= $barang['nama_barang'] ?></td>

                    </tr>

                    <tr>
                        <td style="width:150px"><b>Merek</b></td>
                        <td><?= $barang['merek_barang'] ?></td>

                    </tr>

                    <tr>
                        <td style="width:150px"><b>Harga</b></td>
                        <td><?= $barang['harga_barang'] ?></td>

                    </tr>
                    <tr>
                        <td style="width:150px"><b>Kategori</b></td>
                        <td><?= $barang['kategori_barang'] ?></td>

                    </tr>
                    <tr>
                        <td style="width:150px"><b>Asal Barang</b></td>
                        <td><?= $barang['asal_barang'] ?></td>

                    </tr>

                    <tr>
                        <td style="width:150px"><b>Lokasi</b></td>
                        <td><?= $barang['lokasi_barang'] ?></td>

                    </tr>

                    <tr>
                        <td style="width:150px"><b>Unit</b></td>
                        <td><?= $barang['unit_barang'] ?></td>

                    </tr>

                    <tr>
                        <td style="width:150px"><b>Kondisi</b></td>
                        <td><?= $barang['kondisi_barang'] ?></td>

                    </tr>

                    <tr>
                        <td style="width:150px"><b>Keterangan</b></td>
                        <td><?= $barang['keterangan_barang'] ?></td>
                    </tr>

                    <tr>
                        <td style="width:150px"><b>Tanggal Pembukuan</b></td>
                        <td><?= date('d/m/Y', strtotime($barang['tanggal_pembukuan'])) ?></td>
                    </tr>


                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>