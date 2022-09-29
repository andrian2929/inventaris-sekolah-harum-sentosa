<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{

    protected $table            = 'unit';
    protected $allowedFields    = ['nama', 'email', ''];
    protected $useTimestamps = true;


    public function getUser($username = false, $password = false)
    {
        if ($username == false && $password == false) {
            return $this->findAll();
        } else {
            $db = \Config\Database::connect();
            return $db->query("SELECT * FROM user WHERE username = '$username' AND password = PASSWORD('$password')")->getRowArray();
        }
    }

    public function search($keyword)
    {
        $builder = $this->table('unit');
        $builder->like('nama_unit', $keyword);
        return $builder;
    }
}
