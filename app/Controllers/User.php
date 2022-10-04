<?php

namespace App\Controllers;

use App\Models\UserModel;


class User extends BaseController
{
    public function __construct()
    {
        if (!(session()->get('nama'))) :
            header('Location: /login');
            die();
        endif;
    }
    public function index()
    {
        session();
        $username = session()->get('username');
        $userModel = new UserModel();
        $user = $userModel->gerUserByUsername($username);

        $data = ['title' => 'Data User', 'validation' => \Config\Services::validation(), 'user' => $user];
        return view('user/index', $data);
    }

    public function proses_edit()
    {
        $rules = [
            'nama_lengkap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi'
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[user.username]',
                'errors' => [
                    'required' => 'Username harus diisi',
                    'is_unique' => 'Username sudah terdaftar'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/user')->withInput();
        } else {
        }
    }

    public function ganti_password()
    {
    }
}
