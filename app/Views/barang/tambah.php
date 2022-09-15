<?= $this->extend('templates/layout') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <form action="/barang/prosestambah" method="post">
                <div class="card-body">
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
                            <input type="text" class="form-control <?= ($validation->hasError('kategori_barang')) ? 'is-invalid' : '' ?>" id="kategori_barang" placeholder="Masukkan kategori barang" name="kategori_barang" value="<?= old('kategori_barang') ?>">
                            <span class="error invalid-feedback"> <?= $validation->getError('kategori_barang') ?></span>
                        </div>
                        <div class="col-6">
                            <label>Kondisi</label>
                            <select class="form-control select2bs4 <?= ($validation->hasError('kondisi_barang')) ? 'is-invalid' : '' ?>" style="width: 100%;">
                                <option selected="selected">Baik</option>
                                <option>Rusak</option>
                                <option>California</option>
                                <option>Delaware</option>
                                <option>Tennessee</option>
                                <option>Texas</option>
                                <option>Washington</option>
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
                            <input type="text" class="form-control <?= ($validation->hasError('unit_barang')) ? 'is-invalid' : '' ?>" id="unit_barang" placeholder="Masukkan asal unit" name="unit_barang" value="<?= old('unit_barang') ?>">
                            <span class="error invalid-feedback"> <?= $validation->getError('unit_barang') ?></span>
                        </div>
                        <div class="col-6">
                            <label for="lokasi_barang">Lokasi</label>
                            <input type="text" class="form-control <?= ($validation->hasError('lokasi_barang')) ? 'is-invalid' : '' ?>" id="lokasi_barang" placeholder="Masukkan lokasi barang" name="lokasi_barang" value="<?= old('lokasi_barang') ?>">
                            <span class="error invalid-feedback"> <?= $validation->getError('lokasi_barang') ?></span>
                        </div>
                    </div>

                    <div class="form-row mb-2">
                        <div class="col-sm-12 col-md-6">
                            <label for="gambarBarang">Gambar</label>
                            <div class="row">
                                <div class="col">

                                    <div>
                                        <img src="/img/barang/realmebook.jpeg" class="img-thumbnail rounded" alt="">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="gambarBarang" name="gambar_barang">
                                            <label class="custom-file-label" for="gambarBarang">Pilih gambar</label>
                                        </div>
                                    </div>



                                    <div class="callout callout-info mt-3">
                                        <ul>
                                            <li>Gambar harus berformat png, jpeg, jpg</li>
                                            <li>Ukuran gambar harus di bawah 1 MB</li>
                                            <li>Tidak diwajibkan untuk mengunggah gambar</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="keterangan_barang">Keterangan</label>
                            <textarea class="form-control <?= ($validation->hasError('keterangan_barang')) ? 'is-invalid' : '' ?>" id="keterangan_barang" rows="3" name="keterangan_barang">
                           <?= old('keterangan_barang') ?></textarea>
                            <span class="error invalid-feedback"> <?= $validation->getError('keterangan_barang') ?></span>
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