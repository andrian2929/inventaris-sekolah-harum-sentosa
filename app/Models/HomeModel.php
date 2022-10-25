<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
    public function getNum($unit)
    {
        return $this->db->table('barang')->where('unit_barang', $unit)->countAllResults();
    }
}
