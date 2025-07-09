<?php

namespace App\Controllers;
use App\Models\PemesananModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class Pemesanan extends BaseController
{
    protected $pemesananModel;

    public function __construct()
    {
        $this->pemesananModel = new PemesananModel();
    }

    public function index()
    {
        $model = new PemesananModel();
        $data['pemesanan'] = $model->getAll(); // pakai fungsi yang JOIN ke tabel paketwisata
        return view('v_pemesanan', $data);
    }

    public function form($id_wisata = null)
    {
        $db = \Config\Database::connect();
        $paket = $db->table('paketwisata')->get()->getResultArray(); // semua paket

        $data = [
            'judul' => 'Form Pemesanan',
            'paket' => $paket,
            'page'  => 'frontend/v_form_pesan' // halaman isi
        ];
        return view('v_template_frontend', $data);
    }

    public function simpan()
    {
        $this->pemesananModel->insert([
            'id_user'        => session()->get('id_user'),
            'nama_lengkap'  => $this->request->getPost('nama_lengkap'),
            'email'         => $this->request->getPost('email'),
            'no_hp'         => $this->request->getPost('no_hp'),
            'id_wisata'     => $this->request->getPost('id_wisata'),
            'tanggal_pesan' => $this->request->getPost('tanggal_pesan'),
            'jumlah_orang'  => $this->request->getPost('jumlah_orang'),
            'catatan'       => $this->request->getPost('catatan'),
            'status'        => 'pending'
        ]);
        
        $id = $this->pemesananModel->insertID();

        // Ubah redirect ke halaman yang benar
        return redirect()->to('/pesanan-saya')->with('success', 'Pemesanan berhasil! Silakan lanjutkan pembayaran kapan saja.');
    }

    public function export_pdf()
    {
        $data['pemesanan'] = $this->pemesananModel->findAll();

        // Render isi HTML ke view
        $html = view('v_pemesanan_pdf', $data);

        // Load library Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Set ukuran dan orientasi
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF
        $dompdf->render();

        // Output PDF ke browser
        $dompdf->stream('data-pemesanan.pdf', ['Attachment' => false]);
    }

    public function filter()
    {
        $mulai = $this->request->getGet('tanggal_mulai');
        $akhir = $this->request->getGet('tanggal_akhir');

        $model = new PemesananModel();

        $data = [
            'judul' => 'Data Pemesanan',
            'pemesanan' => $model->getByTanggal($mulai, $akhir)
        ];

        return view('v_template_backend', [
            'page' => 'v_pemesanan',
            'judul' => 'Riwayat Pemesanan',
            'pemesanan' => $data['pemesanan']
        ]);
    }

}
