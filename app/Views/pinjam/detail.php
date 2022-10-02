<?= $this->extend('templates/layout') ?>

<?= $this->section('content') ?>
<?= dd($barang); ?>
<div class="card mb-3">
    <div class="row ">
        <div class="col-md-8">
            <div class="card-body">
                <table class="table table-bordered">

                    <tr>
                        <td style="width:150px"><b>Kode Pinjam</b></td>
                        <td scope="col"><?= $pinjam['kode_pinjam'] ?></td>

                    </tr>


                    <tr>
                        <td style="width:150px"><b>Nama Barang</b></td>
                        <td> <?php
                                if ($pinjam['nama_barang'] == null) {
                                ?>
                                <em>Barang telah dihapus</em>
                            <?php
                                } else {
                                    echo $pinjam['nama_barang'];
                                }
                            ?>
                        </td>

                    </tr>

                    <tr>
                        <td style="width:150px"><b>Detail Barang</b></td>
                        <td>
                            <?php
                            if ($pinjam['nama_barang'] == null) {
                            ?>
                                <em>Barang telah dihapus</em>
                            <?php
                            } else {
                            ?>
                                <a target="_blank" href="/barang/detail/<?= $pinjam['kode_barang'] ?>" class="btn btn-primary btn-sm">Lihat detail <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                            <?php
                            }
                            ?>
                        </td>

                    </tr>


                    <tr>
                        <td style="width:150px"><b>Tanggal Pinjam</b></td>
                        <td><?= $pinjam['tanggal_pinjam'] ?></td>

                    </tr>

                    <tr>
                        <td style="width:150px"><b>Tanggal Kembali</b></td>
                        <td><?= $pinjam['tanggal_kembali'] ?></td>

                    </tr>
                    <tr>
                        <td style="width:150px"><b>Kontak</b></td>
                        <td><?= $pinjam['kontak'] ?></td>

                    </tr>
                    <tr>
                        <td style="width:150px"><b>Keterangan</b></td>
                        <td><?= $pinjam['keterangan'] ?></td>

                    </tr>

                    <tr>
                        <td style="width:150px"><b>Barang Kembali</b></td>
                        <td> <?php
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

                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>