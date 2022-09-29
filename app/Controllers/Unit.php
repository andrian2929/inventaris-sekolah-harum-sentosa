<?php

namespace App\Controllers;

use App\Models\UnitModel;

class Unit extends BaseController
{

    public function __construct()
    {
        if (!(session()->get('nama'))) :
            header('Location: /login');
            die();
        endif;

        $this->unitModel = new UnitModel();
    }
    public function index()
    {
        $keyword = $this->request->getVar(('keyword'));
        if ($keyword) {
            $unit = $this->unitModel->search($keyword);
        } else {
            $unit = $this->unitModel;
        }


        $data = ['title' => 'Data Unit', 'units' => $unit->getUnit(), 'keyword' => $keyword];
        return view('unit/index', $data);
    }

    public function tambah()
    {
        session();

        $data = ['title' => 'Tambah Unit', 'validation' => \Config\Services::validation()];
        return view('unit/tambah', $data);
    }

    public function prosestambah()
    {
        $rules = [
            'nama_unit' => [
                'rules' => 'required|is_unique[unit.nama_unit]',
                'errors' => [
                    'required' => 'Nama unit harus diisi',
                    'is_unique' => 'Nama unit sudah ada'
                ]
            ],
            'alamat_unit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat unit harus diisi'
                ]
            ]

        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/unit/tambah')->withInput();
        } else {
            $this->unitModel->save([
                'nama_unit' => $this->request->getVar('nama_unit'),
                'alamat_unit' => $this->request->getVar('alamat_unit')
            ]);
            session()->setFlashdata('pesan', 'Data berhasil disimpan');
            return redirect()->to('/unit');
        }
    }



    public function edit($id)
    {
        session();


        $data = ['title' => 'Edit Data Unit', 'validation' => \Config\Services::validation(), 'unit' => $this->unitModel->getUnit($id)];
        return view('unit/edit', $data);
    }

    public function prosesedit()
    {
        $rules = [
            'nama_unit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama unit harus diisi'
                ]
            ],
            'alamat_unit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat unit harus diisi'
                ]
            ]

        ];



        if (!$this->validate($rules)) {
            return redirect()->to('/unit/edit/' . $this->request->getVar('id_unit'))->withInput();
        } else {
            $this->unitModel->save([
                'id' => $this->request->getVar('id_unit'),
                'nama_unit' => $this->request->getVar('nama_unit'),
                'alamat_unit' => $this->request->getVar('alamat_unit')
            ]);
            session()->setFlashdata('pesan', 'Data berhasil diedit');
            return redirect()->to('/unit');
        }
    }

    public function hapus($id)
    {
        // hapus barang berdasarkan kode barang
        $this->unitModel->where('id', $id)->delete();

        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/unit');
    }
}
