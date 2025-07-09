<?php

namespace App\Controllers;

use App\Models\ModelPaketWisata;
use App\Models\PembayaranModel;
use App\Models\PemesananModel;
use App\Models\ModelGaleri;
use App\Models\ModelBerita;
use App\Models\ModelVideo;
use App\Models\PesanModel;

class Home extends BaseController
{
    public function index(): string
{
    $model = new ModelPaketWisata();
    $galleryModel = new ModelGaleri();
    $beritaModel = new ModelBerita();
    $videoModel = new ModelVideo();

    helper(['text', 'form']);

    $keyword = $this->request->getGet('q');
    if ($keyword) {
        $paket = $model->like('nama_wisata', $keyword)
                       ->orLike('deskripsi', $keyword)
                       ->findAll();
    } else {
        $paket = $model->findAll();
    }

    $data = [
        'judul' => 'Home',
        'page'  => 'v_home',
        'paket' => $paket,
        'galeri' => $galleryModel->orderBy('created_at', 'DESC')->findAll(),
        'berita' => $beritaModel->orderBy('created_at', 'DESC')->findAll(3),
        'video' => $videoModel->orderBy('created_at', 'DESC')->findAll(),
        'keyword' => $keyword
    ];

    return view('v_template_frontend', $data);
}
    public function pembayaran($id_pesan)
    {
        $data = [
            'judul' => 'Form Pembayaran',
            'id_pesan' => $id_pesan,
            'page' => 'frontend/v_form_pembayaran',
        ];
        return view('v_template_frontend', $data);
    }

    public function simpanPembayaran()
    {
        $model = new PembayaranModel();
        $file = $this->request->getFile('bukti_bayar');

        if ($file->isValid() && !$file->hasMoved()) {
            $namaBukti = $file->getRandomName();
            $file->move('uploads/bukti', $namaBukti);
        } else {
            $namaBukti = null;
        }

        $model->insert([
            'id_pesan'      => $this->request->getPost('id_pesan'),
            'tanggal_bayar' => date('Y-m-d H:i:s'),
            'jumlah_bayar'  => $this->request->getPost('jumlah_bayar'),
            'metode'        => $this->request->getPost('metode'),
            'bukti_bayar'   => $namaBukti,
            'status'        => 'menunggu'
        ]);

        // Update status ke 'dibayar'
        $pesanModel = new PemesananModel();
        $pesanModel->update($this->request->getPost('id_pesan'), [
            'status' => 'dibayar'
        ]);

        return redirect()->to('/')->with('success', 'Pembayaran berhasil dikirim!');
    }

    public function autocomplete()
    {
        $keyword = $this->request->getGet('q');
        $model = new ModelPaketWisata();

        $result = $model->select('nama_wisata')
                    ->like('nama_wisata', $keyword)
                    ->limit(10)
                    ->findAll();

        return $this->response->setJSON($result);
    }

    public function pesananSaya()
    {
        if (!session()->get('id_user')) {
            return redirect()->to('/auth')->with('error', 'Silakan login terlebih dahulu');
        }

        $id_user = session()->get('id_user');
        $model = new \App\Models\PemesananModel();

        $pesanan = $model
            ->join('paketwisata', 'paketwisata.id_wisata = pesan.id_wisata')
            ->where('pesan.id_user', $id_user)
            ->orderBy('tanggal_pesan', 'DESC')
            ->findAll();

        $data = [
            'judul' => 'Pesanan Saya',
            'page' => 'frontend/v_pesanan_saya',
            'pesanan' => $pesanan
        ];

        return view('v_template_frontend', $data);
    }


    public function v_paket_wisata()
    {
        $model = new \App\Models\ModelPaketWisata();
        $data = [
            'judul' => 'Paket Wisata',
            'page' => 'v_paket_wisata_frontend',
            'paket' => $model->findAll()
        ];
        return view('v_template_frontend', $data);
    }

    public function deleteData()
    {
        return view('v_delete_data');
    }

}