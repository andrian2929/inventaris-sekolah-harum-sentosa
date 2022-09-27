<?= $this->extend('templates/layout') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <?= $validation->listErrors() ?>
            <form action="/lokasi/prosestambah" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_unit">Unit</label>
                        <select id="nama_unit" name="nama_unit" class="form-control select2bs4">
                            <?php foreach ($units as $unit) : ?>
                                <option value="<?= $unit['id'] ?>"><?= $unit['nama_unit'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="error invalid-feedback"> <?= $validation->getError('nama_unit') ?></span>
                    </div>

                    <div class="form-group">
                        <label for="nama_lokasi">Nama Lokasi</label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama_lokasi')) ? 'is-invalid' : '' ?>" id="nama_lokasi" placeholder="Masukkan nama lokasi" name="nama_lokasi" value="<?= old('nama_lokasi') ?>">
                        <span class="error invalid-feedback"> <?= $validation->getError('nama_lokasi') ?></span>
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