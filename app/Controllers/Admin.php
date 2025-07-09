<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPaketWisata;
use App\Models\PemesananModel;
use App\Models\PembayaranModel;
use App\Models\ModelGaleri;
use CodeIgniter\I18n\Time;
use Dompdf\Dompdf;
use Dompdf\Options;

class Admin extends BaseController
{
    public function __construct()
    {
        if (session()->get('level') != 1) {
            return redirect()->to('auth');
        }
    }

    public function index()
    {
        $modelPaket   = new ModelPaketWisata();
        $modelPesan   = new PemesananModel();
        $modelBayar   = new PembayaranModel();
        $modelGaleri  = new ModelGaleri();

        $hariIni = date('Y-m-d');
        $totalBayarHariIni = $modelBayar
            ->where('DATE(tanggal_bayar)', $hariIni)
            ->selectSum('jumlah_bayar')
            ->first()['jumlah_bayar'] ?? 0;

        $data = [
            'judul' => 'Dashboard Admin',
            'page' => 'v_admin',
            'totalPaket' => $modelPaket->countAll(),
            'totalPesanan' => $modelPesan->countAll(),
            'totalPembayaran' => $modelBayar->countAll(),
            'totalGaleri' => $modelGaleri->countAll(),
            'jumlahPending' => $modelPesan->where('status', 'pending')->countAllResults(),
            'jumlahDibayar' => $modelPesan->where('status', 'dibayar')->countAllResults(),
            'jumlahSelesai' => $modelPesan->where('status', 'selesai')->countAllResults(),
            'totalBayarHariIni' => $totalBayarHariIni
        ];

        return view('v_template_backend', $data);
    }

    public function pembayaran()
    {
        $model = new PembayaranModel();
        $data = [
            'judul' => 'Data Pembayaran',
            'page'  => 'v_pembayaran',
            'pembayaran' => $model->getAllWithPesanan()
        ];
        return view('v_template_backend', $data);
    }

    public function exportPembayaran()
    {
        $mulai = $this->request->getGet('mulai');
        $akhir = $this->request->getGet('akhir');

        $model = new PembayaranModel();
        $data['judul'] = "Laporan Pembayaran";
        $data['laporan'] = $model->getLaporan($mulai, $akhir);
        $data['mulai'] = $mulai;
        $data['akhir'] = $akhir;

        // Load HTML view
        $html = view('laporan/pembayaran_pdf', $data);

        // PDF options
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        $dompdf->stream('Laporan_Pembayaran_' . date('YmdHis') . '.pdf', ['Attachment' => false]);
    }
}
