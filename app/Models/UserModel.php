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

    public function getUserByUsername($username)
    {
        return $this->where(['username' => $username])->first();
    }

    public function editPassword($data, $id)
    {
        $password = $data['password'];
        $this->db->query("UPDATE user SET password = PASSWORD('$password') WHERE id = $id");
    }
}
