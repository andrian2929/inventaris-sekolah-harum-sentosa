<?= $this->extend('templates/layout') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card">

            <form action="/unit/prosesedit" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_unit">Nama</label>
                        <input type="hidden" value="<?= $unit['id'] ?>" name="id_unit">
                        <input type="text" class="form-control <?= ($validation->hasError('nama_unit')) ? 'is-invalid' : '' ?>" id="nama_unit" placeholder="Masukkan nama unit" autofocus name="nama_unit" value="<?= (old('nama_unit')) ? old('nama_unit') : $unit['nama_unit']  ?>">
                        <span class="error invalid-feedback"> <?= $validation->getError('nama_unit') ?></span>
                    </div>

                    <div class="form-group">
                        <label for="alamat_unit">Alamat</label>
                        <textarea placeholder="Masukkan alamat unit" class="form-control <?= ($validation->hasError('alamat_unit')) ? 'is-invalid' : '' ?>" id="alamat_unit" rows="3" name="alamat_unit"><?= (old('alamat_unit')) ? old('alamat_unit') : $unit['alamat_unit'] ?></textarea>
                        <span class="error invalid-feedback"><?= $validation->getError('alamat_unit') ?></span>
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