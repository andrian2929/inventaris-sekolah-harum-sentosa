<?php

namespace App\Controllers;

class Login extends BaseController
{

    public function __construct()
    {
        $this->userModel = new \App\Models\UserModel();
    }
    public function index()
    {
        session();
        $data = ['title' => 'Halaman Login', 'validation' => \Config\Services::validation()];
        return view('login/index', $data);
    }

    public function proseslogin()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');


        $rules =
            [
                'username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Username harus diisi',
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password harus diisi'
                    ]
                ]
            ];

        if (!$this->validate($rules)) {


            return redirect()->to('/login')->withInput();
        } else {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            $user = $this->userModel->getUser($username, $password);


            if ($user) {
                $data = [
                    'username' => $user['username'],
                    'nama' => $user['nama']
                ];
                session()->set($data);
                return redirect()->to('/');
            } else {
                session()->setFlashdata('pesan', 'Username atau password salah');
                return redirect()->to('/login')->withInput();
            }
        }
    }

    public function detach()
    {
        session()->destroy();
        session()->setFlashdata('pesan', 'Anda berhasil logout');
        return redirect()->to('/login');
    }
}
