<?php

namespace App\Models;

use CodeIgniter\Model;

class UnitModel extends Model
{

    protected $table            = 'unit';
    protected $allowedFields    = ['nama_unit', 'alamat_unit'];
    protected $useTimestamps = true;


    public function getUnit($id = false)
    {
        if ($id == false) {
            return $this->orderBy('urutan', 'ASC')->findAll();
        } else {
            return $this->where('id', $id)->first();
        }
    }

    public function search($keyword)
    {
        $builder = $this->table('unit');
        $builder->like('nama_unit', $keyword);
        return $builder;
    }
}
