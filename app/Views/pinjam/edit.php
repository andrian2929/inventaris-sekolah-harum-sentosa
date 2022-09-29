<?= $this->extend('templates/layout') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <form action="/pinjam/prosesedit" method="post">
                <input type="hidden" name="id" value="<?= $pinjam['id'] ?>">
                <input type="hidden" name="kode_pinjam" value="<?= $pinjam['kode_pinjam'] ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_lokasi">Nama Peminjam</label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama_peminjam')) ? 'is-invalid' : '' ?>" id="nama_peminjam" placeholder="Masukkan nama peminjam" name="nama_peminjam" value="<?= (gettype(old('nama_peminjam')) == 'NULL') ? $pinjam['nama_peminjam'] : old('nama_peminjam') ?>">
                        <span class="error invalid-feedback"> <?= $validation->getError('nama_peminjam') ?></span>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Pinjam</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input <?= ($validation->hasError('tanggal_pinjam')) ? 'is-invalid' : '' ?>" data-target="#reservationdate" name="tanggal_pinjam" value="<?= (gettype(old('tanggal_pinjam')) == 'NULL') ? $pinjam['tanggal_pinjam'] : old('tanggal_pinjam') ?>" placeholder="Masukkan tanggal pinjam">
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        <span style="font-size: 80%; display:   <?= ($validation->hasError('tanggal_pinjam')) ? '' : 'none' ?>" class="text-danger"><?= $validation->getError('tanggal_pinjam') ?></span>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Kembali</label>
                        <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input <?= ($validation->hasError('tanggal_kembali')) ? 'is-invalid' : '' ?>" data-target="#reservationdate2" name="tanggal_kembali" value="<?= (gettype(old('tanggal_kembali')) == 'NULL') ? $pinjam['tanggal_kembali'] : old('tanggal_kembali') ?>" placeholder="Masukkan tanggal kembali">
                            <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        <span style="font-size: 80%; display:   <?= ($validation->hasError('tanggal_kembali')) ? '' : 'none' ?>" class="text-danger"><?= $validation->getError('tanggal_kembali') ?></span>
                    </div>

                    <div class="form-group">
                        <label for="kontak_pinjam">Nomor Kontak</label>
                        <input type="text" class="form-control <?= ($validation->hasError('kontak_pinjam')) ? 'is-invalid' : '' ?>" id="kontak_pinjam" placeholder="Masukkan nomor kontak" name="kontak_pinjam" value="<?= (old('nama_kontak')) ? old('nama_kontak') : $pinjam['kontak'] ?>">
                        <span class="error invalid-feedback"> <?= $validation->getError('kontak_pinjam') ?></span>
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : '' ?>" id="keterangan" rows="3" name="keterangan" placeholder="Masukkan keterangan"><?= (old('keterangan')) ? old('keterangan') : $pinjam['keterangan'] ?></textarea>
                        <span class="error invalid-feedback"><?= $validation->getError('keterangan') ?></span>
                    </div>



                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Edit</button>
                </div>
            </form>


        </div>
    </div>
</div>
<?= $this->endSection() ?>