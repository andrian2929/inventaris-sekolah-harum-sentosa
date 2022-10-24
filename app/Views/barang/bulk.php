<?= $this->extend('templates/layout') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card">

            <form action="/barang/proses-bulk-input" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="jumlah_barang">Jumlah Barang</label>
                        <input type="text" class="form-control <?= ($validation->hasError('jumlah_barang')) ? 'is-invalid' : '' ?>" id="jumlah_barang" placeholder="Masukkan nama barang" autofocus name="jumlah_barang" value="<?= old('jumlah_barang') ?>">
                        <span class="error invalid-feedback"> <?= $validation->getError('jumlah_barang') ?></span>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label for="nama_barang">Nama</label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama_barang')) ? 'is-invalid' : '' ?>" id="nama_barang" placeholder="Masukkan nama barang" autofocus name="nama_barang" value="<?= old('nama_barang') ?>">
                        <span class="error invalid-feedback"> <?= $validation->getError('nama_barang') ?></span>
                    </div>
                    <div class="form-row mb-2">
                        <div class="col-6">
                            <label for="merek_barang">Merek</label>
                            <input type="text" class="form-control <?= ($validation->hasError('merek_barang')) ? 'is-invalid' : '' ?>" id="merek_barang" placeholder="Masukkan merek barang" name="merek_barang" value="<?= old('merek_barang') ?>">
                            <span class="error invalid-feedback"> <?= $validation->getError('merek_barang') ?></span>
                        </div>

                        <div class="col-6">
                            <label for="harga_barang">Harga</label>
                            <input type="number" class="form-control <?= ($validation->hasError('harga_barang')) ? 'is-invalid' : '' ?>" id="harga_barang" placeholder="Masukkan harga barang" name="harga_barang" value="<?= old('harga_barang') ?>">
                            <span class="error invalid-feedback"> <?= $validation->getError('harga_barang') ?></span>
                        </div>
                    </div>

                    <div class="form-row mb-2">
                        <div class="col-6">
                            <label for="kategori_barang">Kategori</label>
                            <select name="kategori_barang" id="" class="form-control select2bs4">
                                <?php $kategori = ['Kendaraan', 'Elektronik', 'Barang Tidak Bergerak', 'Barang Bergerak'] ?>
                                <?php foreach ($kategori as $ktg) : ?>
                                    <option <?php if (old('kategori_barang') !== null) {
                                                if (old('kategori_barang') == $ktg) {
                                                    echo 'selected';
                                                }
                                            } ?> value="<?= $ktg ?>"><?= $ktg ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="error invalid-feedback"> <?= $validation->getError('merek_barang') ?></span>
                        </div>
                        <div class="col-6">
                            <label>Kondisi</label>
                            <select name="kondisi_barang" class="form-control <?= ($validation->hasError('kondisi_barang')) ? 'is-invalid' : '' ?>" style="width: 100%;">
                                <?php $kondisis = ['Baik', 'Setengah Rusak', 'Rusak'] ?>
                                <?php foreach ($kondisis as $kondisi) : ?>
                                    <option <?php if (old('kondisi_barang') !== null) {
                                                if (old('kondisi_barang') == $kondisi) {
                                                    echo 'selected';
                                                }
                                            } ?> value="<?= $kondisi ?>"><?= $kondisi ?></option>
                                <?php endforeach; ?>

                            </select>
                            <span class="error invalid-feedback"> <?= $validation->getError('kondisi_barang') ?></span>
                        </div>
                    </div>

                    <div class="form-row mb-2">
                        <div class="col-6">
                            <label for="asal_barang">Asal</label>
                            <input type="text" class="form-control <?= ($validation->hasError('asal_barang')) ? 'is-invalid' : '' ?>" id="asal_barang" placeholder="Masukkan asal barang" name="asal_barang" value="<?= old('asal_barang') ?>">
                            <span class="error invalid-feedback"> <?= $validation->getError('asal_barang') ?></span>
                        </div>

                        <div class="col-6">
                            <label>Tanggal Pembukuan</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input <?= ($validation->hasError('tanggal_pembukuan')) ? 'is-invalid' : '' ?>" data-target="#reservationdate" name="tanggal_pembukuan" value="<?= old('tanggal_pembukuan') ?>" placeholder="Masukkan tanggal pembukuan">
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                            <span style="font-size: 80%; display:   <?= ($validation->hasError('tanggal_pembukuan')) ? '' : 'none' ?>" class="text-danger"><?= $validation->getError('tanggal_pembukuan') ?></span>




                        </div>
                    </div>

                    <div class="form-row mb-2">
                        <div class="col-6">
                            <label for="unit_barang">Unit</label>
                            <select name="unit_barang" id="" class="form-control select2bs4">
                                <?php foreach ($unit as $unt) : ?>
                                    <option <?php if (old('unit_barang') !== null) {
                                                if (old('unit_barang') == $unt['nama_unit']) {
                                                    echo 'selected';
                                                }
                                            } ?> value="<?= $unt['nama_unit'] ?>"><?= $unt['nama_unit'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="error invalid-feedback"> <?= $validation->getError('lokasi_barang') ?></span>
                        </div>
                        <div class="col-6">
                            <label for="lokasi_barang">Lokasi</label>
                            <select name="lokasi_barang" id="" class="form-control select2bs4">
                                <?php foreach ($lokasi as $lok) : ?>
                                    <option <?php if (old('lokasi_barang') !== null) {
                                                if (old('lokasi_barang') == $lok['nama_lokasi']) {
                                                    echo 'selected';
                                                }
                                            } ?> value="<?= $lok['nama_lokasi'] ?>"><?= $lok['nama_lokasi'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="error invalid-feedback"> <?= $validation->getError('lokasi_barang') ?></span>
                        </div>
                    </div>

                    <div class="form-row mb-2">
                        <div class="col-sm-12 col-md-6">
                            <label for="keterangan_barang">Keterangan</label>
                            <textarea class="form-control <?= ($validation->hasError('keterangan_barang')) ? 'is-invalid' : '' ?>" id="keterangan_barang" rows="3" name="keterangan_barang"><?= old('keterangan_barang') ?></textarea>
                            <span class="error invalid-feedback"><?= $validation->getError('keterangan_barang') ?></span>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <label for="fotoBarang">Gambar</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('foto_barang')) ? 'is-invalid' : '' ?>" id="fotoBarang" name="foto_barang">
                                <label class="custom-file-label" for="inputGroupFile01">Pilih foto</label>
                            </div>
                            <span style="font-size:small" class="text-danger"><?= $validation->getError('foto_barang') ?></span>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Tambah</button>
                </div>
            </form>


        </div>
    </div>
</div>
<?= $this->endSection() ?>