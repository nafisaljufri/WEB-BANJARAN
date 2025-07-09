<?php

namespace App\Controllers;

use App\Models\PembayaranModel;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends BaseController
{
    protected $pembayaranModel;

    public function __construct()
    {
        $this->pembayaranModel = new PembayaranModel();
    }

    public function index()
    {
        $data = [
            'judul' => 'Laporan Pembayaran',
            'page'  => 'v_laporan_pembayaran',
            'laporan' => []
        ];
        return view('v_template_backend', $data);
    }

    public function filter()
    {
        $mulai = $this->request->getPost('tanggal_mulai');
        $akhir = $this->request->getPost('tanggal_akhir');

        $laporan = $this->pembayaranModel->getLaporan($mulai, $akhir);

        $data = [
            'judul' => 'Laporan Pembayaran',
            'page'  => 'v_laporan_pembayaran',
            'laporan' => $laporan,
            'tgl_awal' => $mulai,
            'tgl_akhir' => $akhir
        ];

        return view('v_template_backend', $data);
    }

    public function pdf()
{
    $mulai = $this->request->getVar('tanggal_mulai');
    $akhir = $this->request->getVar('tanggal_akhir');

    if (!$mulai || !$akhir) {
        echo "Tanggal tidak dikirim!"; exit;
    }

    $laporan = $this->pembayaranModel->getLaporan($mulai, $akhir);

    $dompdf = new \Dompdf\Dompdf();
    $html = view('laporan/pembayaran_pdf', [
        'laporan' => $laporan,
        'mulai'   => $mulai,
        'akhir'   => $akhir
    ]);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream('laporan-pembayaran.pdf', ['Attachment' => true]); // <- untuk download langsung
}

    public function excel()
    {
        $mulai = $this->request->getPost('tanggal_mulai');
        $akhir = $this->request->getPost('tanggal_akhir');

        $laporan = $this->pembayaranModel->getLaporan($mulai, $akhir);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $sheet->setCellValue('A1', 'No')
              ->setCellValue('B1', 'Nama')
              ->setCellValue('C1', 'Tgl Pesan')
              ->setCellValue('D1', 'Jumlah Orang')
              ->setCellValue('E1', 'Tgl Bayar')
              ->setCellValue('F1', 'Jumlah Bayar')
              ->setCellValue('G1', 'Status');

        // Data
        $row = 2;
        $no = 1;
        foreach ($laporan as $data) {
            $sheet->setCellValue('A' . $row, $no++)
                  ->setCellValue('B' . $row, $data['nama_user'])
                  ->setCellValue('C' . $row, $data['tanggal_pesan'])
                  ->setCellValue('D' . $row, $data['jumlah_orang'])
                  ->setCellValue('E' . $row, $data['tanggal_bayar'])
                  ->setCellValue('F' . $row, $data['jumlah_bayar'])
                  ->setCellValue('G' . $row, ucfirst($data['status']));
            $row++;
        }

        // Output
        $writer = new Xlsx($spreadsheet);
        $filename = 'laporan-pembayaran.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        $writer->save("php://output");
    }
}
