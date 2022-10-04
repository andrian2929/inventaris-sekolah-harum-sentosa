<?= $this->extend('templates/layout') ?>

<?= $this->section('content') ?>

<?php if (count($barang) == 1) : ?>
    <?php $barang = $barang[0] ?>
    <div class="card mb-3">

        <div class="row container ">
            <div class="col-md-8">
                <div class="card-body">

                    <?php if (empty($redirect_kode)) : ?>
                        <div class="col-auto">
                            <?php if (!empty($keyword)) : ?>
                                <a href="/barang?keyword=<?= $keyword ?>&page_barang=<?= $redirect ?>" class="btn btn-info btn-small mb-2">Kembali ke tabel barang</a>
                            <?php else : ?>
                                <a href="/barang?page_barang=<?= $redirect ?>" class="btn btn-info btn-small mb-2">Kembali ke tabel barang</a>
                            <?php endif; ?>
                        <?php else : ?>
                            <a href="/barang/detail/<?= $redirect_kode ?>?redirect_page=<?= $redirect ?>" class="btn btn-info btn-small mb-2">Kembali ke tabel detail</a>
                        <?php endif; ?>
                        </div>

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
                        <div class="row">

                            <?php if ($redirect_kode or $keyword) : ?>



                            <?php else : ?>
                                <div class="col-auto">
                                    <a href="/barang/edit/<?= $barang['kode_barang'] ?>?redirect_page=<?= $redirect ?>" class="btn btn-info btn-sm mb-2 mt-2"><i class="fa-solid fa-pen-to-square"></i> Edit </a>
                                    <a onclick="return confirm('Apakah anda yakin ingin menghapus item ini?');" href="/barang/hapus/<?= $barang['kode_barang'] ?>?redirect_page=<?= $redirect ?>" class="btn btn-danger btn-sm mb-2 mt-2"><i class="fa-solid fa-trash"></i> Hapus </a>

                                </div>

                            <?php endif; ?>





                        </div>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="card mb-3">

        <div class="row ">
            <div class="col-md-8">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <a href="/barang?page_barang=<?= $redirect ?>" class="btn btn-info btn-small mb-2">Kembali ke tabel barang</a>
                        </div>
                    </div>
                    <table class="table table-bordered">

                        <tr>
                            <td style="width:150px"><b>Nama Barang</b></td>
                            <td scope="col"><?= $barang[0]['nama_barang'] ?></td>
                        </tr>

                        <tr>
                            <td style="width:150px"><b>Unit</b></td>
                            <td>
                                <?= $barang[0]['unit_barang'] ?>
                            </td>

                        </tr>

                        <tr>
                            <td style="width:150px"><b>Lokasi/Ruangan</b></td>
                            <td><?= $barang[0]['lokasi_barang'] ?></td>
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
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success mb-3" role="alert">
            <?= session()->getFlashdata('pesan') ?>
        </div>
    <?php endif; ?>

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
                                <td><?= $brg['kondisi_barang'] ?></td>
                                <td><?= $brg['keterangan_barang'] ?></td>
                                <td style="width: 150px ;" class="text-center">
                                    <a href="/barang/detail/<?= $brg['kode_barang'] ?>?redirect_page=<?= $redirect ?>&redirect_kode_barang=<?= $redirect_kode_barang ?>" class="btn btn-info btn-sm mb-2"><i class="fa-solid fa-eye"></i></a>

                                    <a onclick="return confirm('Apakah anda yakin ingin menghapus item ini?');" href="/barang/hapus/<?= $brg['kode_barang'] ?>?redirect=detail&redirect_kode=<?= $redirect_kode_barang ?>&redirect_page=<?= $redirect ?>" class="btn btn-danger btn-sm mb-2"><i class="fa-solid fa-trash"></i></a>

                                    <a href="/barang/edit/<?= $brg['kode_barang'] ?>?redirect=detail&redirect_kode=<?= $redirect_kode_barang ?>&redirect_page=<?= $redirect ?>" class="btn btn-primary btn-sm mb-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>



                    </tbody>
                </table>
                <a onclick="return confirm('Apakah anda yakin ingin menghapus item ini?');" href="/barang/hapus/<?= $redirect_kode_barang ?>?redirect_page=<?= $redirect ?>" class="btn btn-danger btn-sm mb-2 mt-2"><i class="fa-solid fa-trash"></i> Hapus semua </a>
            </div>
        </div>
    </div>
<?php endif; ?>



<?= $this->endSection() ?>