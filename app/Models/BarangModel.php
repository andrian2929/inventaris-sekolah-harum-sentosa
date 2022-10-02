<?php

namespace App\Models;

use CodeIgniter\Model;


class BarangModel extends Model
{

    protected $table            = 'barang';
    protected $allowedFields    = ['kode_barang', 'nama_barang', 'kategori_barang', 'asal_barang', 'lokasi_barang', 'unit_barang', 'kondisi_barang', 'merek_barang', 'harga_barang', 'foto_barang', 'keterangan_barang', 'tanggal_pembukuan'];
    protected $useTimestamps = true;



    public function getBarang($kode_barang = false)
    {
        if ($kode_barang == false) {
            return $this->findAll();
        } else {
            return $this->where('kode_barang', $kode_barang)->first();
        }
    }
    public function getBarangDetail($kode_barang)
    {

        $this->db->table('barang');
        $this->select('*');
        $this->whereIn('kode_barang', explode(',', $kode_barang));
        return $this->get()->getResultArray();
    }

    public function getBarangTabel()
    {
        $this->db->table("barang");
        $this->selectCount('*', 'jumlah');
        $this->select('nama_barang, merek_barang, lokasi_barang, unit_barang, harga_barang, group_concat(kode_barang) as kode_barang');
        $this->groupBy(['nama_barang', 'merek_barang', 'lokasi_barang', 'unit_barang', 'harga_barang']);
        $this->orderBy('lokasi_barang', 'DESC');
        return $this->paginate(10, 'pinjam');
    }

    public function searchBarangTabel($keyword)
    {
        $keyword = $this->request->getVar('keyword');
        $this->db->table("barang");
        $this->selectCount('*', 'jumlah');
        $this->select('nama_barang, merek_barang, lokasi_barang, unit_barang, harga_barang');
        $this->groupBy(['nama_barang', 'merek_barang', 'lokasi_barang', 'unit_barang', 'harga_barang']);
        $this->orderBy('lokasi_barang', 'DESC');
        $this->like('nama_barang', $keyword);
        $this->orLike('merek_barang', $keyword);
        $this->orLike('lokasi_barang', $keyword);
        $this->orLike('unit_barang', $keyword);
        $this->orLike('harga_barang', $keyword);
        return $this->paginate(10, 'pinjam');
    }

    public function search($keyword)
    {
        $builder = $this->table('barang');
        $builder->like('nama_barang', $keyword);
        return $builder;
    }
}
