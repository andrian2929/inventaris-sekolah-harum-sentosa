<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{

    public function __construct()
    {
        $this->userModel = new UserModel();
    }


    public function index()
    {
        session();

        $data = ['title' => 'Halaman User', 'validation' => \Config\Services::validation(), 'user' => $this->userModel->getUserByUsername(session()->get('username'))];


        return view('user/index', $data);
    }

    public function proses_edit()
    {

        if ($this->request->getVar('username') == session()->get('username')) {
            $rules = [
                'username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Username harus diisi'
                    ]
                ],
                'nama_lengkap' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Lengkap harus diisi'
                    ]
                ]
            ];
        } else {
            $rules = [
                'username' => [
                    'rules' => 'required|is_unique[user.username]',
                    'errors' => [
                        'required' => 'Username harus diisi',
                        'is_unique' => 'Username ini sudah ada yang pakai'
                    ]
                ],
                'nama_lengkap' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Lengkap harus diisi'
                    ]
                ]
            ];
        }


        if ($this->validate($rules)) {
            $this->userModel->save([
                'id' => $this->request->getVar('id'),
                'username' => $this->request->getVar('username'),
                'nama' => $this->request->getVar('nama_lengkap')
            ]);
            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to('/login/detach');
        } else {
            session()->setFlashdata('pesan', 'Data gagal diubah');
            return redirect()->to('/user')->withInput();
        }
    }

    public function ganti_password()
    {
        $rules = ['password' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Password harus diisi'
            ]
        ]];

        if ($this->validate($rules)) {
            $this->userModel->editPassword([
                'password' => $this->request->getVar('password')
            ], $this->request->getVar('id'));

            session()->setFlashdata('pesan', 'Password berhasil diubah');
            return redirect()->to('/login/detach');
        } else {

            return redirect()->to('/user')->withInput();
        }
    }
}
