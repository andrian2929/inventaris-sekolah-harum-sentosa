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
        $data = ['title' => "Tambah Barang"];
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
}
