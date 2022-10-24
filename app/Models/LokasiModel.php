<?php

namespace App\Models;

use CodeIgniter\Model;

class LokasiModel extends Model
{
    protected $table            = 'lokasi';
    protected $allowedFields    = ['nama_lokasi', 'nama_unit'];
    protected $useTimestamps = true;

    public function getLokasi($id = false)
    {

        if ($id) {
            $this->select('lokasi.id, unit.nama_unit, lokasi.nama_lokasi ');
            $this->join('unit', 'lokasi.nama_unit = unit.id');
            return $this->where('lokasi.id', $id)->first();
        } else {
            $this->select('lokasi.id, unit.nama_unit, lokasi.nama_lokasi ');
            $this->join('unit', 'lokasi.nama_unit = unit.id');
            $this->orderBy('unit.urutan', 'ASC');
            return $this->findAll();
        }
    }


    public function search($keyword)
    {
        $this->select('lokasi.id, unit.nama_unit, lokasi.nama_lokasi ');
        $this->join('unit', 'lokasi.nama_unit = unit.id');
        $this->like('lokasi.nama_lokasi', $keyword);
        return $this->findAll();
    }
}
