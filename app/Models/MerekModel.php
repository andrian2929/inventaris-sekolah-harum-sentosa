<?php

namespace App\Models;

use CodeIgniter\Model;

class MerekModel extends Model
{

    protected $table            = 'merek';
    protected $allowedFields    = ['nama_merek'];
    protected $useTimestamps = true;


    public function getMerek()
    {

        return $this->findAll();
    }
}
