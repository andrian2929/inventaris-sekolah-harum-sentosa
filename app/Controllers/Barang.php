<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\UnitModel;
use App\Models\LokasiModel;
use App\Models\MerekModel;

class Barang extends BaseController
{

    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->unitModel = new UnitModel();
        $this->lokasiModel = new LokasiModel();
        $this->merekModel = new MerekModel();
    }
    public function index()
    {
        $keyword = $this->request->getVar(('keyword'));
        if ($keyword) {
            $barang = $this->barangModel->search($keyword);
        } else {
            $barang = $this->barangModel;
        }

        $data = [
            'title' => "Tabel Data Barang",
            'barang' => $barang->paginate(10, 'barang'),
            'pager' => $this->barangModel->pager,
            'keyword' => $keyword
        ];
        return view('barang/index', $data);
    }

    public function tambah()
    {
        session();

        $data = ['title' => "Tambah Barang", 'validation' => \Config\Services::validation(), 'unit' => $this->unitModel->getUnit(), 'lokasi' => $this->lokasiModel->getLokasi()];
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
                'kode_barang' => $this->checkId(),
                'nama_barang' => $this->request->getVar('nama_barang'),
                'kategori_barang' => $this->request->getVar('kategori_barang'),
                'asal_barang' => $this->request->getVar('asal_barang'),
                'lokasi_barang' => $this->request->getVar('lokasi_barang'),
                'unit_barang' => $this->request->getVar('unit_barang'),
                'kondisi_barang' => $this->request->getVar('kondisi_barang'),
                'merek_barang' => ucwords($this->request->getVar('merek_barang')),
                'harga_barang' => $this->request->getVar('harga_barang'),
                'foto_barang' => 'default.jpg',
                'keterangan_barang' => $this->request->getVar('keterangan_barang'),
                'tanggal_pembukuan' => $this->request->getVar('tanggal_pembukuan'),

            ]);
            session()->setFlashdata('pesan', 'Data berhasil disimpan');
            return redirect()->to('/barang');
        }
    }


    private function checkId()
    {
        $init_id = 1;

        date_default_timezone_set('Asia/Jakarta');





        do {
            $set_kode = "BRG" . date('dmY') . $init_id;
            $init_id++;
        } while ($this->barangModel->getBarang($set_kode));

        return $set_kode;
    }


    public function hapus($kode_barang)
    {
        // hapus barang berdasarkan kode barang
        $this->barangModel->where('kode_barang', $kode_barang)->delete();

        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/barang');
    }

    public function edit($kode_barang)
    {
        session();

        $data = ['title' => "Edit Barang", 'validation' => \Config\Services::validation(), 'unit' => $this->unitModel->getUnit(), 'lokasi' => $this->lokasiModel->getLokasi(), 'merek' => $this->merekModel->getMerek(), 'barang' => $this->barangModel->getBarang($kode_barang)];
        return view('barang/edit', $data);
    }


    public function prosesedit()
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
            return redirect()->to('/barang/edit/' . $this->request->getVar('kode_barang'))->withInput();
        } else {


            $this->barangModel->save([
                'id' => $this->request->getVar('id_barang'),
                'kode_barang' => $this->checkId(),
                'nama_barang' => $this->request->getVar('nama_barang'),
                'kategori_barang' => $this->request->getVar('kategori_barang'),
                'asal_barang' => $this->request->getVar('asal_barang'),
                'lokasi_barang' => $this->request->getVar('lokasi_barang'),
                'unit_barang' => $this->request->getVar('unit_barang'),
                'kondisi_barang' => $this->request->getVar('kondisi_barang'),
                'merek_barang' => ucwords($this->request->getVar('merek_barang')),
                'harga_barang' => $this->request->getVar('harga_barang'),
                'foto_barang' => 'default.jpg',
                'keterangan_barang' => $this->request->getVar('keterangan_barang'),
                'tanggal_pembukuan' => $this->request->getVar('tanggal_pembukuan'),

            ]);
            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to('/barang');
        }
    }
}
