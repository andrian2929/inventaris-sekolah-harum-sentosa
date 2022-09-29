<?php

namespace App\Controllers;

use App\Models\LokasiModel;
use App\Models\UnitModel;

class Lokasi extends BaseController
{

    public function __construct()
    {
        if (!(session()->get('nama'))) :
            header('Location: /login');
            die();
        endif;

        $this->lokasiModel = new LokasiModel();
        $this->unitModel = new UnitModel();
    }
    public function index()
    {
        $keyword = $this->request->getVar(('keyword'));
        if ($keyword) {
            $lokasi = $this->lokasiModel->search($keyword);
        } else {
            $lokasi = $this->lokasiModel->getLokasi();
        }


        $data = ['title' => 'Data Unit', 'lokasis' => $lokasi, 'keyword' => $keyword];
        return view('lokasi/index', $data);
    }

    public function tambah()
    {
        session();

        $data = ['title' => 'Tambah Lokasi', 'validation' => \Config\Services::validation(), 'units' => $this->unitModel->getUnit()];
        return view('lokasi/tambah', $data);
    }

    public function prosestambah()
    {

        $rules = [
            'nama_unit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama unit harus diisi'

                ]
            ],
            'nama_lokasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama lokasi unit harus diisi'
                ]
            ]

        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/lokasi/tambah')->withInput();
        } else {

            $this->lokasiModel->save([
                'nama_lokasi' => $this->request->getVar('nama_lokasi'),
                'nama_unit' => $this->request->getVar('nama_unit')

            ]);
            session()->setFlashdata('pesan', 'Data berhasil disimpan');
            return redirect()->to('/lokasi');
        }
    }



    public function edit($id)
    {
        session();


        $data = ['title' => 'Edit Data Unit', 'validation' => \Config\Services::validation(), 'units' => $this->unitModel->getUnit(), 'lokasi' => $this->lokasiModel->getLokasi($id), 'unitModel' => $this->unitModel];
        return view('lokasi/edit', $data);
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
            'nama_lokasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama lokasi harus diisi'
                ]
            ]

        ];



        if (!$this->validate($rules)) {
            return redirect()->to('/lokasi/edit/' . $this->request->getVar('id'))->withInput();
        } else {
            $this->lokasiModel->save([
                'id' => $this->request->getVar('id'),
                'nama_unit' => $this->request->getVar('nama_unit'),
                'nama_lokasi' => $this->request->getVar('nama_lokasi')
            ]);
            session()->setFlashdata('pesan', 'Data berhasil diedit');
            return redirect()->to('/lokasi');
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
