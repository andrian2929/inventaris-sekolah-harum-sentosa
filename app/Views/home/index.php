<?= $this->extend('templates/layout') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center mt-2">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= $num['SMK Harum Sentosa'] ?></h3>

                <p>SMK Harum Sentosa</p>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= $num['SMA Harum Sentosa'] ?></h3>
                <p>SMA Harum Sentosa</p>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $num['SMP Harum Sentosa'] ?></h3>

                <p>SMP Harum Sentosa</p>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?= $num['TK Harum Sentosa'] ?></h3>
                <p>TK Harum Sentosa</p>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection() ?>