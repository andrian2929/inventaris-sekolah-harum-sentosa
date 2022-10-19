<?= $this->extend('templates/auth') ?>

<?= $this->section('content') ?>

<div class="login-box" style="margin-top: -100px;">

    <!-- /.login-logo -->
    <div class="card">
        <div class="login-logo">
            <p>Inventaris <br> Harum Sentosa</p>
            <img width="60px" src="/img/logo_sekolah.jpeg" alt="logo sekolah">
        </div>

        <div class="card-body login-card-body">
            <h4 class="login-box-msg">Login di sini</h4>

            <form action="login/proseslogin" method="post">
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-danger mb-3 text-center" role="alert">
                        <?= session()->getFlashdata('pesan') ?>
                    </div>
                <?php endif; ?>
                <div class="input-group mb-3">
                    <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : '' ?>" placeholder="Username" name="username" value="<?= old('username') ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    <span class="error invalid-feedback"> <?= $validation->getError('username') ?></span>
                </div>

                <div class="input-group mb-3">
                    <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : '' ?>" placeholder="Password" name="password" value="<?= old('password') ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <span class="error invalid-feedback"> <?= $validation->getError('password') ?></span>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col">
                        <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>




        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
<?= $this->endSection() ?>