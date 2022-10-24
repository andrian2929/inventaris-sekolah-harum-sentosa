<?php $this->extend('templates/layout'); ?>

<?php $this->section('content') ?>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h3>Ubah profil</h3>

                <form action="/user/edit-user" method="POST">
                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                    <div class="form-group">
                        <label for="nama-lengkap">Nama Lengkap</label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama_lengkap')) ? 'is-invalid' : '' ?>" id="nama-lengkap" placeholder="Masukkan nama lengkap" name="nama_lengkap" value="<?= $user['nama'] ?>">
                        <span class="error invalid-feedback"> <?= $validation->getError('nama_lengkap') ?></span>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : '' ?>" id="username" placeholder="Masukkan username" name="username" value="<?= $user['username'] ?>">
                        <span class="error invalid-feedback"> <?= $validation->getError('username') ?></span>
                    </div>

                    <button type="submit" class="btn btn-primary">Ubah</button>
                </form>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h3>Ganti password</h3>

                <form action="/user/ganti-password" method="POST">
                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : '' ?>" id="password" placeholder="Masukkan password" name="password">
                        <span class="error invalid-feedback"> <?= $validation->getError('password') ?></span>
                    </div>

                    <button type="submit" class="btn btn-success">Ubah</button>
                </form>

            </div>
        </div>
    </div>
</div>
<?php $this->endSection() ?>