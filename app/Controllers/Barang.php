<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;

class Barang extends BaseController
{

    public function __construct()
    {
        $this->barangModel = new BarangModel();
    }
    public function index()
    {
        $data = ['title' => "Tabel Data Barang", 'barang' => $this->barangModel->getBarang()];
        return view('barang/index', $data);
    }

    public function tambah()
    {
        session();
        $data = ['title' => "Tambah Barang", 'validation' => \Config\Services::validation()];
        return view('barang/tambah', $data);
    }

    public function detail($kode_barang)
    {


        $data = ['title' => 'Detail Data Barang', 'barang' => $this->barangModel->getBarang($kode_barang)];
        return view('barang/detail', $data);
    }


    public function tampil()
    {

        $data = ['title' => "Tabel Data Barang", 'barang' => $this->barangModel->getBarang()];
        return view('barang/index', $data);
    }

    public function prosestambah()
    {
        $rules = [
            'nama_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi'
                ]
            ],
            'merek_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Merek harus diisi'
                ]
            ],
            'harga_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga barang harus diisi',
                    'numeric' => 'Harga harus berupa angka'
                ]
            ],
            'kategori_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori harus diisi',

                ]
            ],
            'kondisi_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kondisi barang harus diisi',

                ]
            ],
            'unit_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Unit barang harus diisi',

                ]
            ],
            'lokasi_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lokasi barang harus diisi',

                ]
            ],
            'tanggal_pembukuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal pembukuan harus diisi',

                ]
            ],
            'asal_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Asal barang harus diisi',

                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/barang/tambah')->withInput();
        } else {


            $this->barangModel->save([
                'nama_barang' => $this->request->getVar('nama_barang'),
                'kategori_barang' => $this->request->getVar('kategori_barang'),
                'asal_barang' => $this->request->getVar('asal_barang'),
                'lokasi_barang' => $this->request->getVar('lokasi_barang'),
                'unit_barang' => $this->request->getVar('unit_barang'),
                'kondisi_barang' => $this->request->getVar('kondisi_barang'),
                'merek_barang' => $this->request->getVar('merek_barang'),
                'harga_barang' => $this->request->getVar('harga_barang'),
                'foto_barang' => 'default.jpg',
                'keterangan_barang' => $this->request->getVar('keterangan_barang'),
                'tanggal_pembukuan' => $this->request->getVar('tanggal_pembukuan'),

            ]);
        }
    }
}
