<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{

    protected $table            = 'user';
    protected $allowedFields    = ['nama', 'username', 'password'];
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

    public function gerUserByUsername($username)
    {
        return $this->where(['username' => $username])->first();
    }
}
