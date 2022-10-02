<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Dompdf\Dompdf;
use App\Models\UnitModel;
use App\Models\LokasiModel;
use App\Models\LaporanModel;

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



        $filename = date('y-m-d-H-i-s') . '-laporan';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $dompdf->loadHtml(view('laporan/pdf_view', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename . ".pdf", array("Attachment" => false));
    }
}
