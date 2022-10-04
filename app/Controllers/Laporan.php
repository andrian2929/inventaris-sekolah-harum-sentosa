<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Dompdf\Dompdf;
use App\Models\UnitModel;
use App\Models\LokasiModel;
use App\Models\LaporanModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends Controller
{

    public function __construct()
    {
        $this->unitModel = new UnitModel();
        $this->lokasiModel = new LokasiModel();
        $this->laporanModel = new LaporanModel();
    }

    public function index()
    {
        $data = ['title' => "Laporan", 'units' => $this->unitModel->getUnit(), 'lokasis' => $this->lokasiModel->getLokasi(), 'lokasis' => $this->lokasiModel->getLokasi(), 'validation' => \Config\Services::validation()];
        return view('laporan/index', $data);
    }

    public function generate()
    {
        $lokasi = $this->request->getVar('nama_lokasi');
        $unit = $this->request->getVar('nama_unit');
        $to_date = $this->request->getVar('to_date');
        $from_date = $this->request->getVar('from_date');

        ($lokasi == 'all') ? $lokasi = false : $lokasi;
        ($unit == 'all') ? $unit = false : $unit;
        ($to_date == '') ? $to_date = false : $to_date;
        ($from_date == '') ? $from_date = false : $from_date;

        $data = ['barangs' => $this->laporanModel->getBarang($lokasi, $unit, $to_date, $from_date)];

        if ($this->request->getVar('pdf') == 'exportpdf') {
            $filename = date('y-m-d-H-i-s') . '-laporan.pdf';
            $dompdf = new Dompdf();
            $dompdf->loadHtml(view('laporan/pdf_view', $data));
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            $dompdf->stream($filename . ".pdf", array("Attachment" => false));
        } else if ($this->request->getVar('excel')) {
            helper('filesystem');
            delete_files('upload_excel/');
            $filename = date('y-m-d-H-i-s') . '-laporan.xlsx';

            $lokasi = $this->request->getVar('nama_lokasi');
            $unit = $this->request->getVar('nama_unit');
            $to_date = $this->request->getVar('to_date');
            $from_date = $this->request->getVar('from_date');

            ($lokasi == 'all') ? $lokasi = false : $lokasi;
            ($unit == 'all') ? $unit = false : $unit;
            ($to_date == '') ? $to_date = false : $to_date;
            ($from_date == '') ? $from_date = false : $from_date;

            $data = ['barangs' => $this->laporanModel->getBarang($lokasi, $unit, $to_date, $from_date)];

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'No');
            $sheet->setCellValue('B1', 'Kode Barang');
            $sheet->setCellValue('C1', 'Nama Barang');
            $sheet->setCellValue('D1', 'Merek');
            $sheet->setCellValue('E1', 'Asal Dana');
            $sheet->setCellValue('F1', 'Unit');
            $sheet->setCellValue('G1', 'Lokasi');
            $sheet->setCellValue('H1', 'Harga');
            $sheet->setCellValue('I1', 'Tanggal Pembukuan');
            $rows = 2;
            $no = 1;
            foreach ($data['barangs'] as $barang) {
                $sheet->setCellValue('A' . $rows, $no++);
                $sheet->setCellValue('B' . $rows, $barang['kode_barang']);
                $sheet->setCellValue('C' . $rows, $barang['nama_barang']);
                $sheet->setCellValue('D' . $rows, $barang['merek_barang']);
                $sheet->setCellValue('E' . $rows, $barang['asal_barang']);
                $sheet->setCellValue('F' . $rows, $barang['unit_barang']);
                $sheet->setCellValue('G' . $rows, $barang['lokasi_barang']);
                $sheet->setCellValue('H' . $rows, $barang['harga_barang']);
                $sheet->setCellValue('I' . $rows, $barang['tanggal_pembukuan']);
                $rows++;
            }

            $writer = new Xlsx($spreadsheet);
            $writer->save("upload_excel/" . $filename);
            header("Content-Type: application/vnd.ms-excel");
            return redirect()->to(base_url('upload_excel/' . $filename));
        }
    }
}
