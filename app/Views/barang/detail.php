<?= $this->extend('templates/layout') ?>

<?= $this->section('content') ?>

<?php if (count($barang) == 1) : ?>
    <?php $barang = $barang[0] ?>
    <div class="card mb-3">
        <div class="row ">
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
                            <td>
                                <?php
                                $fmt = numfmt_create('id_ID', NumberFormatter::CURRENCY);
                                echo numfmt_format_currency($fmt, $barang['harga_barang'], "IDR")
                                ?>
                            </td>

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
                    <a onclick="return confirm('Apakah anda yakin ingin menghapus item ini?');" href="/barang/hapus/<?= $barang['kode_barang'] ?>" class="btn btn-danger btn-sm mb-2 mt-2"><i class="fa-solid fa-trash"></i> Hapus </a>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="card mb-3">
        <div class="row ">
            <div class="col-md-8">
                <div class="card-body">
                    <table class="table table-bordered">

                        <tr>
                            <td style="width:150px"><b>Nama Barang</b></td>
                            <td scope="col">Kursi Lipat</td>
                        </tr>

                        <tr>
                            <td style="width:150px"><b>Unit</b></td>
                            <td>SMK</td>

                        </tr>

                        <tr>
                            <td style="width:150px"><b>Lokasi/Ruangan</b></td>
                            <td>Ruangan XI-1 SMK</td>
                        </tr>

                        <tr>
                            <td style="width:150px"><b>Jumlah</b></td>
                            <td><?= count($barang) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th style="width: 15px;">No</th>
                            <th style="width:20px ;">Kode </th>
                            <th>Nama</th>
                            <th>Kondisi</th>
                            <th>Keterangan</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i = 1; ?>
                        <?php foreach ($barang as $brg) : ?>
                            <tr>
                                <td class="text-center"><?= $i++; ?></td>
                                <td><?= $brg['kode_barang'] ?></td>
                                <td><?= $brg['nama_barang'] ?></td>
                                <td><?= $brg['kondisi_barang'] ?></td>
                                <td><?= $brg['keterangan_barang'] ?></td>
                                <td style="width: 150px ;" class="text-center">
                                    <a href="/barang/detail/<?= $brg['kode_barang'] ?>" class="btn btn-info btn-sm mb-2"><i class="fa-solid fa-eye"></i></a>
                                    <a onclick="return confirm('Apakah anda yakin ingin menghapus item ini?');" href="/barang/hapus/<?= $brg['kode_barang'] ?>?redirect=detail&redirect_kode=<?= $redirect_kode_barang ?>" class="btn btn-danger btn-sm mb-2"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>



                    </tbody>
                </table>
                <a onclick="return confirm('Apakah anda yakin ingin menghapus item ini?');" href="/barang/hapus/<?= $redirect_kode_barang ?>" class="btn btn-danger btn-sm mb-2 mt-2"><i class="fa-solid fa-trash"></i> Hapus semua </a>
            </div>
        </div>
    </div>
<?php endif; ?>



<?= $this->endSection() ?>