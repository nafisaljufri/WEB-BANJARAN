<?php

namespace App\Controllers;

use App\Models\PembayaranModel;
use App\Models\PemesananModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;
use Dompdf\Options;

class Pembayaran extends BaseController
{
    protected $pembayaranModel;
    protected $pemesananModel;

    public function __construct()
    {
        $this->pembayaranModel = new PembayaranModel();
        $this->pemesananModel = new PemesananModel();
    }

    public function index()
    {
        $data = [
            'judul' => 'Kelola Pembayaran',
            'page'  => 'v_pembayaran',
            'pembayaran' => $this->pembayaranModel->getAllWithPesanan()
        ];
        return view('v_template_backend', $data);
    }

    public function verifikasi($id)
    {
        $this->pembayaranModel->update($id, ['status' => 'terverifikasi']);
        return redirect()->to('/pembayaran')->with('success', 'Pembayaran diverifikasi');
    }

    public function gagal($id)
    {
        $this->pembayaranModel->update($id, ['status' => 'gagal']);
        return redirect()->to('/pembayaran')->with('error', 'Pembayaran digagalkan');
    }

    public function hapus($id)
    {
        $this->pembayaranModel->delete($id);
        return redirect()->to('/pembayaran')->with('success', 'Data dihapus');
    }

    public function laporan()
    {
        $data = [
            'judul' => 'Laporan Pembayaran & Pemesanan',
            'page'  => 'v_laporan_pembayaran',
            'laporan' => []
        ];
        return view('v_template_backend', $data);
    }

    public function filter()
    {
        $mulai = $this->request->getPost('tanggal_mulai');
        $akhir = $this->request->getPost('tanggal_akhir');

        $data = [
            'judul' => 'Laporan Pembayaran',
            'page'  => 'v_laporan_pembayaran',
            'laporan' => $this->pembayaranModel->getLaporan($mulai, $akhir),
            'tgl_awal' => $mulai,
            'tgl_akhir' => $akhir,
        ];

        return view('v_template_backend', $data);
    }

    public function exportExcel()
    {
        $tgl_awal = session()->get('tgl_awal') ?? date('Y-m-01');
        $tgl_akhir = session()->get('tgl_akhir') ?? date('Y-m-d');

        $data = $this->pembayaranModel->getLaporan($tgl_awal, $tgl_akhir);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Tanggal Pesan');
        $sheet->setCellValue('D1', 'Jumlah Orang');
        $sheet->setCellValue('E1', 'Tanggal Bayar');
        $sheet->setCellValue('F1', 'Jumlah Bayar');
        $sheet->setCellValue('G1', 'Status');

        // Data
        $row = 2;
        $no = 1;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $item['nama_lengkap']);
            $sheet->setCellValue('C' . $row, $item['tanggal_pesan']);
            $sheet->setCellValue('D' . $row, $item['jumlah_orang']);
            $sheet->setCellValue('E' . $row, $item['tanggal_bayar']);
            $sheet->setCellValue('F' . $row, $item['jumlah_bayar']);
            $sheet->setCellValue('G' . $row, $item['status']);
            $row++;
        }

        // Output Excel
        $writer = new Xlsx($spreadsheet);
        $filename = 'laporan_pembayaran.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        $writer->save('php://output');
        exit;
    }

    public function exportPDF()
    {
        $tgl_awal  = $this->request->getGet('mulai');
        $tgl_akhir = $this->request->getGet('akhir');

        // Validasi tanggal
        if (!$tgl_awal || !$tgl_akhir) {
            return redirect()->back()->with('error', 'Tanggal awal dan akhir wajib diisi.');
        }

        // Ambil data dari database
        $pembayaran = $this->pembayaranModel
            ->join('user', 'user.id_user = pembayaran.id_user')
            ->where('tanggal_bayar >=', $tgl_awal)
            ->where('tanggal_bayar <=', $tgl_akhir)
            ->findAll();

        // Siapkan HTML view
        $data = [
            'pembayaran' => $pembayaran,
            'tgl_awal' => $tgl_awal,
            'tgl_akhir' => $tgl_akhir
        ];
        $html = view('admin/pdf_pembayaran', $data); // Buat file ini!

        // Konfigurasi Dompdf
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Outputkan PDF
        $dompdf->stream('Laporan Pembayaran ' . $tgl_awal . ' - ' . $tgl_akhir . '.pdf', ['Attachment' => false]);
    }

}
