<?= $this->extend('templates/layout') ?>

<?php $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3>Data Pengguna</h3>
                </div>
                <div class="card-body">
                    <form action="/user/proses-edit" method="POST">
                        <div class="form-group">
                            <label for="inputNamaLengkap">Nama Lengkap</label>
                            <input type="text" class="form-control <?= ($validation->hasError('nama_lengkap')) ? 'is-invalid' : '' ?>" id="inputNamaLengkap" placeholder="Masukkan nama barang" name="nama_lengkap" value="<?= old('nama_lengkap') ?>" autofocus>
                            <span class="error invalid-feedback"> <?= $validation->getError('nama_lengkap') ?></span>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <label for="inputUsername">Username</label>
                                <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : '' ?>" id="inputUsername" placeholder="Masukkan nama barang" name="username" value="<?= old('username') ?>" autofocus>
                                <span class="error invalid-feedback"> <?= $validation->getError('username') ?></span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection() ?>