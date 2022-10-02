<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $table  = 'barang';

    public function getBarang($lokasi = false, $unit = false, $to_date = false, $from_date = false)
    {

        if ($to_date && $from_date) {
            if ($lokasi && $unit) {
                return $this->where('lokasi_barang', $lokasi)->where('unit_barang', $unit)->where('tanggal_pembukuan >=', $from_date)->where('tanggal_pembukuan <=', $to_date)->findAll();
            } else if ($lokasi) {
                return $this->where('lokasi_barang', $lokasi)->where('tanggal_pembukuan >=', $from_date)->where('tanggal_pembukuan <=', $to_date)->findAll();
            } else if ($unit) {
                return $this->where('unit_barang', $unit)->where('tanggal_pembukuan >=', $from_date)->where('tanggal_pembukuan <=', $to_date)->findAll();
            } else {

                return $this->where('tanggal_pembukuan >=', $from_date)->where('tanggal_pembukuan <=', $to_date)->findAll();
            }
        } else {
            if ($lokasi && $unit) {
                return $this->where('lokasi_barang', $lokasi)->where('unit_barang', $unit)->findAll();
            } else if ($lokasi) {
                return $this->where('lokasi_barang', $lokasi)->findAll();
            } else if ($unit) {
                return $this->where('unit_barang', $unit)->findAll();
            } else {
                return $this->findAll();
            }
        }
    }
}
