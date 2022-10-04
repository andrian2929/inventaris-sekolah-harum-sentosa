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
        if (!(session()->get('nama'))) :
            header('Location: /login');
            die();
        endif;

        $this->barangModel = new BarangModel();
        $this->unitModel = new UnitModel();
        $this->lokasiModel = new LokasiModel();
        $this->merekModel = new MerekModel();
        $this->uri = service('uri');
    }
    public function index()
    {


        $redirect = $this->request->getVar('page_barang');

        $redirect = $this->request->getVar('page_barang') ? $this->request->getVar('page_barang') : 1;


        $keyword = $this->request->getVar(('keyword'));
        if ($keyword) {
            $barang = $this->barangModel->search($keyword);
            $view = 'barang/index2';
        } else {

            $barang = $this->barangModel->getBarangTabel();
            $view = 'barang/index';
        }



        $data = [
            'title' => "Tabel Data Barang",
            'barang' => $barang,
            'pager' => $this->barangModel->pager,
            'keyword' => $keyword,
            'redirect' => $redirect
        ];
        return view($view, $data);
    }

    public function tambah()
    {
        session();

        $data = ['title' => "Tambah Barang", 'validation' => \Config\Services::validation(), 'unit' => $this->unitModel->getUnit(), 'lokasi' => $this->lokasiModel->getLokasi()];
        return view('barang/tambah', $data);
    }

    public function detail($kode_barang)
    {


        $data = ['title' => 'Detail Data Barang', 'barang' => $this->barangModel->getBarangDetail($kode_barang), 'redirect_kode_barang' => $kode_barang, 'redirect' => $this->request->getVar('redirect_page'), 'redirect_kode' => $this->request->getVar('redirect_kode_barang'), 'keyword' => $this->request->getVar('keyword')];


        return view('barang/detail', $data);
    }


    public function tampil()
    {
        $redirect =  $this->uri->getQuery();

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
        $redirect = '/barang';

        $barangs = explode(',', $kode_barang);


        if (count($barangs) == 1) {

            $this->barangModel->where('kode_barang', $barangs[0])->delete();
        } else {
            foreach ($barangs as $barang) {
                $this->barangModel->where('kode_barang', $barang)->delete();
            }
        }

        if ($this->request->getVar('redirect')) {
            if ($this->request->getVar('redirect') == 'detail') {
                if ($this->request->getVar('redirect_kode')) {
                    if ($this->request->getVar('redirect_page')) {

                        $url_before =  explode(',', $this->request->getVar('redirect_kode'));
                        $url_before = array_diff($url_before, $barangs);
                        $redirect = '/barang/detail/' . implode(',', $url_before) . '?redirect_page=' . $this->request->getVar('redirect_page');
                    } else {
                        $redirect = '/barang';
                    }
                } else {
                    $redirect = '/barang';
                }
            } else {
                $redirect = '/barang';
            }
        } else if ($this->request->getVar('redirect_page')) {

            if ($this->request->getVar('keyword')) {
                $redirect = '/barang?keyword=' . $this->request->getVar('keyword') . '&page_barang=' . $this->request->getVar('redirect_page');
            } else {
                $redirect = '/barang?page_barang=' . $this->request->getVar('redirect_page');
            }
        }

        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to($redirect);
    }

    public function edit($kode_barang)
    {
        session();

        $data = ['title' => "Edit Barang", 'validation' => \Config\Services::validation(), 'unit' => $this->unitModel->getUnit(), 'lokasi' => $this->lokasiModel->getLokasi(), 'merek' => $this->merekModel->getMerek(), 'barang' => $this->barangModel->getBarang($kode_barang), 'redirect_page' => $this->request->getVar('redirect_page'), 'redirect_codes' => $this->request->getVar('redirect_kode'), 'redirect' => $this->request->getVar('redirect'), 'keyword' => $this->request->getVar('keyword')];
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
            return redirect()->to('/barang/edit/' . $this->request->getVar('kode_barang') . '?redirect_page=' . $this->request->getVar('redirect_page'))->withInput();
        } else {


            $this->barangModel->save([
                'id' => $this->request->getVar('id_barang'),
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


            if ($this->request->getVar('redirect_page')) {
                if ($this->request->getVar('redirect') == 'detail' and $this->request->getVar('redirect_codes')) {
                    $redirect = '/barang/detail/' . $this->request->getVar('redirect_codes') . '?redirect_page=' . $this->request->getVar('redirect_page');
                } else if ($this->request->getVar('keyword')) {
                    $redirect = '/barang?keyword=' . $this->request->getVar('keyword') . '&page_barang=' . $this->request->getVar('redirect_page');
                } else {
                    $redirect = '/barang?page_barang=' . $this->request->getVar('redirect_page');
                }
            } else {
                $redirect = '/barang';
            }

            return redirect()->to($redirect);
        }
    }

    public function bulk_input()
    {
        session();

        $data = ['title' => "Bulk Input Barang", 'validation' => \Config\Services::validation(), 'unit' => $this->unitModel->getUnit(), 'lokasi' => $this->lokasiModel->getLokasi()];
        return view('barang/bulk', $data);
    }

    public function proses_bulk_input()
    {

        $rules = [
            'jumlah_barang' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah barang harus diisi',
                    'numeric' => 'Jumlah barang harus berupa angka'
                ]
            ],

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
            return redirect()->to('/barang/bulk-input')->withInput();
        } else {


            $jumlah_barang = $this->request->getVar('jumlah_barang');
            for ($i = 0; $i < $jumlah_barang; $i++) {
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
            }
            session()->setFlashdata('pesan', 'Berhasil menambahkan ' . $jumlah_barang . ' data');
            return redirect()->to('/barang');
        }
    }
}
