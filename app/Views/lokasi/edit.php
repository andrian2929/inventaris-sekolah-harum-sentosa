<?= $this->extend('templates/layout') ?>

<?= $this->section('content') ?>
<?php

use App\Models\UnitModel;

$unitModel = new UnitModel();



?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <form action="/lokasi/prosesedit" method="post">
                <input type="hidden" value="<?= $lokasi['id'] ?>" name="id">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_unit">Unit</label>
                        <select id="nama_unit" name="nama_unit" class="form-control select2bs4">
                            <?php foreach ($units as $unit) : ?>
                                <option <?php if (old('nama_unit')) {
                                            if ($unitModel->getUnit(old('nama_unit'))['nama_unit'] == $unit['nama_unit']) {
                                                echo "selected";
                                            }
                                        } else {
                                            if ($unit['nama_unit'] == $lokasi['nama_unit']) {
                                                echo "selected";
                                            }
                                        } ?> value="<?= $unit['id'] ?>"><?= $unit['nama_unit'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="error invalid-feedback"> <?= $validation->getError('nama_unit') ?></span>
                    </div>

                    <div class="form-group">
                        <label for="nama_lokasi">Nama Lokasi</label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama_lokasi')) ? 'is-invalid' : '' ?>" id="nama_lokasi" placeholder="Masukkan nama lokasi" name="nama_lokasi" value="<?= (old('nama_lokasi') === null) ? $lokasi['nama_lokasi'] : old('nama_lokasi') ?>">
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