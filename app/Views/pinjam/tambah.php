<?= $this->extend('templates/layout') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <?= $validation->listErrors() ?>
            <form action="/pinjam/prosestambah" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_lokasi">Nama Peminjam</label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama_peminjam')) ? 'is-invalid' : '' ?>" id="nama_peminjam" placeholder="Masukkan nama peminjam" name="nama_peminjam" value="<?= old('nama_peminjam') ?>">
                        <span class="error invalid-feedback"> <?= $validation->getError('nama_peminjam') ?></span>
                    </div>

                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <select id="nama_barang" name="nama_barang" class="form-control select2bs4">
                            <?php foreach ($barangs as $barang) : ?>
                                <option value="<?= $barang['id'] ?>"><?= $barang['nama_barang'] ?> - <?= $barang['lokasi_barang'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="error invalid-feedback"> <?= $validation->getError('nama_barang') ?></span>
                    </div>


                    <div class="form-group">
                        <label>Tanggal Pinjam</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input <?= ($validation->hasError('tanggal_pinjam')) ? 'is-invalid' : '' ?>" data-target="#reservationdate" name="tanggal_pinjam" value="<?= old('tanggal_pinjam') ?>" placeholder="Masukkan tanggal pinjam">
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        <span style="font-size: 80%; display:   <?= ($validation->hasError('tanggal_pinjam')) ? '' : 'none' ?>" class="text-danger"><?= $validation->getError('tanggal_pinjam') ?></span>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Kembali</label>
                        <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input <?= ($validation->hasError('tanggal_kembali')) ? 'is-invalid' : '' ?>" data-target="#reservationdate2" name="tanggal_kembali" value="<?= old('tanggal_kembali') ?>" placeholder="Masukkan tanggal kembali">
                            <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        <span style="font-size: 80%; display:   <?= ($validation->hasError('tanggal_kembali')) ? '' : 'none' ?>" class="text-danger"><?= $validation->getError('tanggal_kembali') ?></span>
                    </div>

                    <div class="form-group">
                        <label for="kontak_pinjam">Nomor kontak</label>
                        <input type="text" class="form-control <?= ($validation->hasError('kontak_pinjam')) ? 'is-invalid' : '' ?>" id="kontak_pinjam" placeholder="Masukkan nomor kontak" name="kontak_pinjam" value="<?= old('kontak_pinjam') ?>">
                        <span class="error invalid-feedback"> <?= $validation->getError('kontak_pinjam') ?></span>
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : '' ?>" id="keterangan" rows="3" name="keterangan" placeholder="Masukkan keterangan"><?= old('keterangan') ?></textarea>
                        <span class="error invalid-feedback"><?= $validation->getError('keterangan') ?></span>
                    </div>



                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                </div>
            </form>


        </div>
    </div>
</div>
<?= $this->endSection() ?>