<?= $this->extend('templates/layout') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <?= $validation->listErrors(); ?>
            <form action="/laporan/generate" method="post">
                <div class="form-row mb-2 mt-2 container">
                    <div class="col-sm-12 col-md-6">
                        <label for="nama_unit">Nama Unit</label>
                        <select name="nama_unit" class="form-control select2bs4">
                            <option value="all">Semua unit</option>
                            <?php foreach ($units as $unit) : ?>
                                <option value="<?= $unit['nama_unit'] ?>"><?= $unit['nama_unit'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="error invalid-feedback"> <?= $validation->getError('nama_unit') ?></span>
                    </div>

                    <div class="col-sm-12 col-md-6">
                        <label for="nama_lokasi">Nama Lokasi</label>
                        <select name="nama_lokasi" class="form-control select2bs4">
                            <option value="all">Semua lokasi</option>
                            <?php foreach ($lokasis as $lokasi) : ?>
                                <option value="<?= $lokasi['nama_lokasi'] ?>"><?= $lokasi['nama_lokasi'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="error invalid-feedback"> <?= $validation->getError('nama_lokasi') ?></span>
                    </div>
                </div>

                <div class="form-row mb-2 mt-2 container">
                    <div class="col-sm-12 col-md-6">
                        <label>Dari</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input <?= ($validation->hasError('from_date')) ? 'is-invalid' : '' ?>" data-target="#reservationdate" name="from_date" value="<?= old('from_date') ?>" placeholder="Boleh kosong">
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6">
                        <label>Sampai</label>
                        <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input <?= ($validation->hasError('from_date')) ? 'is-invalid' : '' ?>" data-target="#reservationdate2" name="to_date" value="<?= old('from_date') ?>" placeholder="Boleh kosong">
                            <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-download"></i> Unduh</button>
                </div>
        </div>

        </form>


    </div>
</div>
</div>
<?= $this->endSection() ?>