<?php

namespace App\Models;

use CodeIgniter\Model;

class PinjamModel extends Model
{

    protected $table            = 'pinjam';
    protected $allowedFields    = ['id', 'nama_peminjam', 'nama_barang', 'tanggal_pinjam', 'tanggal_kembali', 'kontak', 'keterangan', 'is_returned', 'kode_pinjam'];
    protected $useTimestamps = true;

    public function getPinjam($kode_pinjam = false)
    {
        $this->select('pinjam.id, pinjam.kode_pinjam, barang.kode_barang , barang.nama_barang, pinjam.nama_peminjam, pinjam.tanggal_pinjam, pinjam.tanggal_kembali, pinjam.kontak, pinjam.keterangan, pinjam.is_returned');
        $this->join('barang', 'pinjam.nama_barang = barang.id', 'left');

        if ($kode_pinjam) {
            return $this->where('pinjam.kode_pinjam', $kode_pinjam)->first();
        } else {
            return $this->paginate(10, 'pinjam');
        }
    }

    public function search($keyword)
    {
        $this->select('pinjam.id, pinjam.kode_pinjam, barang.kode_barang , barang.nama_barang, pinjam.nama_peminjam, pinjam.tanggal_pinjam, pinjam.tanggal_kembali, pinjam.kontak, pinjam.keterangan, pinjam.is_returned');
        $this->join('barang', 'pinjam.nama_barang = barang.id', 'left');
        $this->like('pinjam.nama_peminjam', $keyword);
        $this->orLike('barang.nama_barang', $keyword);
        $this->orLike('kode_pinjam', $keyword);
        return $this->paginate(10, 'pinjam');
    }

    public function getBarangPinjam()
    {

        $db = \Config\Database::connect();
        return  $db->query("SELECT id, nama_barang, lokasi_barang from barang where id not in (select nama_barang from pinjam where is_returned = '0')")->getResultArray();
    }
}
