<?= $this->extend('templates/layout') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <form>
                <form action="">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_barang">Nama</label>
                            <input type="text" class="form-control" id="nama_barang" placeholder="Masukkan nama barang" autofocus name="merek_barang">
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-6">
                                <label for="merek_barang">Merek</label>
                                <input type="text" class="form-control" id="merek_barang" placeholder="Masukkan merek barang">
                            </div>

                            <div class="col-6">
                                <label for="harga_barang">Harga</label>
                                <input type="number" class="form-control" id="harga_barang" placeholder="Masukkan harga barang">
                            </div>
                        </div>

                        <div class="form-row mb-2">
                            <div class="col-6">
                                <label for="kategori_barang">Kategori</label>
                                <input type="text" class="form-control" id="kategori_barang" placeholder="Masukkan harga barang">
                            </div>
                            <div class="col-6">
                                <label for="kondisi_barang">Kondisi</label>
                                <input type="text" class="form-control" id="kondisi_barang" placeholder="Masukkan kondisi barang">
                            </div>
                        </div>

                        <div class="form-row mb-2">
                            <div class="col-6">
                                <label for="asal_barang">Asal</label>
                                <input type="number" class="form-control" id="asal_barang" placeholder="Masukkan asal barang">
                            </div>

                            <div class="col-6">
                                <label for="tanggal_pembukuan">Tanggal Pembukuan</label>
                                <input type="number" class="form-control" id="tanggal_pembukuan" placeholder="Masukkan asal unit">
                            </div>
                        </div>

                        <div class="form-row mb-2">
                            <div class="col-6">
                                <label for="unit_barang">Unit</label>
                                <input type="number" class="form-control" id="unit_barang" placeholder="Masukkan asal unit">
                            </div>
                            <div class="col-6">
                                <label for="lokasi_barang">Lokasi</label>
                                <input type="text" class="form-control" id="lokasi_barang" placeholder="Masukkan lokasi barang">
                            </div>
                        </div>

                        <div class="form-row mb-2">
                            <div class="col-sm-12 col-md-6">
                                <label for="exampleInputFile">Gambar</label>
                                <div class="row">
                                    <div class="col">

                                        <div>
                                            <img src="/img/barang/realmebook.jpeg" class="img-thumbnail rounded" alt="">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Pilih gambar</label>
                                            </div>
                                        </div>



                                        <div class="callout callout-info mt-3">
                                            <ul>
                                                <li>Gambar harus berformat png, jpeg, jpg</li>
                                                <li>Ukuran gambar harus di bawah 1 MB</li>
                                                <li>Tidak diwajibkan untuk mengunggah gambar</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="exampleFormControlTextarea1">Keterangan</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Tambah</button>
                    </div>
                </form>


        </div>
    </div>
</div>
<?= $this->endSection() ?>