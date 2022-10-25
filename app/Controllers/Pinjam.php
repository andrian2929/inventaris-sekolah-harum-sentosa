<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\PinjamModel;
use CodeIgniter\I18n\Time;

class Pinjam extends BaseController
{

    public function __construct()
    {
        if (!(session()->get('nama'))) :
            header('Location: /login');
            die();
        endif;

        $this->pinjamModel = new PinjamModel();
        $this->barangModel = new BarangModel();
    }

    public function index()
    {

        $keyword = $this->request->getVar(('keyword'));
        if ($keyword) {
            $pinjam = $this->pinjamModel->search($keyword);
        } else {
            $pinjam = $this->pinjamModel->getPinjam();
        }


        $data = [
            'title' => "Data Peminjaman Barang",
            'pinjams' =>  $pinjam,
            'pager' => $this->pinjamModel->pager,
            'keyword' => $keyword
        ];
        return view('pinjam/index', $data);
    }


    public function tambah()
    {
        session();
        if ($pinjam = $this->pinjamModel->getPinjam()) {
            $barang = $this->pinjamModel->getBarangPinjam();
        } else {

            $barang = $this->barangModel->getBarang();
        }


        $data = ['title' => "Tambah Peminjaman", 'validation' => \Config\Services::validation(), 'barangs' => $barang];
        return view('pinjam/tambah', $data);
    }

    public function return($id)
    {
        $this->pinjamModel->save([
            'id' => $id,
            'is_returned' => 1,
            'tanggal_kembali' => new Time('now', 'Asia/Jakarta', 'id_ID')
        ]);
        session()->setFlashdata('pesan', 'Berhasil dikembalikan');
        return redirect()->to('/pinjam');
    }

    public function detail($kode_barang)
    {
        $pinjam = $this->pinjamModel->getPinjam($kode_barang);

        $time = Time::parse($pinjam['tanggal_kembali'], 'Asia/Jakarta', 'id_ID');

        $pinjam['humanize_time'] = $time->humanize();


        $data = ['title' => 'Detail Data Pinjam Barang', 'pinjam' => $pinjam];
        return view('pinjam/detail', $data);
    }


    public function tampil()
    {
        $data = ['title' => "Data Barang", 'barang' => $this->barangModel->getBarang()];
        return view('barang/index', $data);
    }

    public function prosestambah()
    {
        $rules = [
            'nama_peminjam' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama peminjam harus diisi'
                ]
            ],
            'nama_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih nama barang'
                ]
            ],
            'tanggal_pinjam' => [
                'rules' => 'required|valid_date[Y-m-d]',
                'errors' => [
                    'required' => 'Tanggal pinjam harus diisi',
                    'valid_date' => 'Tanggal tidak valid'
                ]
            ],
            'tanggal_kembali' => [
                'rules' => 'required|valid_date[Y-m-d]',
                'errors' => [
                    'required' => 'Tanggal kembali harus diisi',
                    'valid_date' => 'Tanggal tidak valid'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/pinjam/tambah')->withInput();
        } else {

            $this->request->getVar('kontak_pinjam');
            $this->pinjamModel->save([
                'kode_pinjam' => $this->checkKodePinjam(),
                'nama_peminjam' => $this->request->getVar('nama_peminjam'),
                'nama_barang' => $this->request->getVar('nama_barang'),
                'tanggal_pinjam' => $this->request->getVar('tanggal_pinjam'),
                'tanggal_kembali' => $this->request->getVar('tanggal_kembali'),
                'kontak' => $this->request->getVar('kontak_pinjam'),
                'keterangan' => $this->request->getVar('keterangan'),
                'is_returned' => '0'

            ]);
            session()->setFlashdata('pesan', 'Data berhasil disimpan');
            return redirect()->to('/pinjam');
        }
    }


    private function checkKodePinjam()
    {
        $init_id = 1;

        date_default_timezone_set('Asia/Jakarta');

        do {
            $set_kode = "PJM" . date('dmY') . $init_id;
            $init_id++;
        } while ($this->pinjamModel->getPinjam($set_kode));

        return $set_kode;
    }


    public function hapus($kode_pinjam)
    {

        $this->pinjamModel->where('kode_pinjam', $kode_pinjam)->delete();
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/pinjam');
    }

    public function edit($kode_barang)
    {
        session();
        $dataPinjam = $this->pinjamModel->getPinjam($kode_barang);
        $data = ['title' => "Edit Pinjam", 'validation' => \Config\Services::validation(), 'pinjam' => $dataPinjam];

        if ($dataPinjam['is_returned'] == 1) {
            session()->setFlashdata('pesan', 'Barang yang sudah dikembalikan tidak dapat diedit');
            return redirect()->to('/pinjam');
        } else {
            return view('pinjam/edit', $data);
        }
    }


    public function prosesedit()
    {
        $rules = [
            'nama_peminjam' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama peminjam harus diisi'
                ]
            ],
            'tanggal_pinjam' => [
                'rules' => 'required|valid_date[Y-m-d]',
                'errors' => [
                    'required' => 'Tanggal pinjam harus diisi',
                    'valid_date' => 'Tanggal tidak valid'
                ]
            ],
            'tanggal_kembali' => [
                'rules' => 'required|valid_date[Y-m-d]',
                'errors' => [
                    'required' => 'Tanggal kembali harus diisi',
                    'valid_date' => 'Tanggal tidak valid'
                ]
            ]
        ];


        if (!$this->validate($rules)) {

            return redirect()->to('/pinjam/edit/' . $this->request->getVar('kode_pinjam'))->withInput();
        } else {


            $this->pinjamModel->save([
                'id' => $this->request->getVar('id'),
                'nama_peminjam' => $this->request->getVar('nama_peminjam'),
                'tanggal_pinjam' => $this->request->getVar('tanggal_pinjam'),
                'tanggal_kembali' => $this->request->getVar('tanggal_kembali'),
                'kontak' => $this->request->getVar('kontak_pinjam'),
                'keterangan' => $this->request->getVar('keterangan'),

            ]);

            session()->setFlashdata('pesan', 'Data berhasil diubah');
            return redirect()->to('/pinjam');
        }
    }
}
