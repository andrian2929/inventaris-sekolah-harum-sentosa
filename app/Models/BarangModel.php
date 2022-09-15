<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{

    protected $table            = 'barang';
    protected $allowedFields    = ['kode_barang', 'nama_barang', 'kategori_barang', 'asal_barang', 'lokasi_barang', 'unit_barang', 'kondisi_barang', 'merek_barang', 'harga_barang', 'foto_barang', 'keterangan_barang', 'tanggal_pembukuan'];
    protected $useTimestamps = true;

    public function getBarang($kode_barang = false)
    {
        if ($kode_barang == false) {
            return $this->findAll();
        } else {
            return $this->where('kode_barang', $kode_barang)->first();
        }
    }
}
