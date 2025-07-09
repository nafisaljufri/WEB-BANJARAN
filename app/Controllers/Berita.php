<?php

namespace App\Controllers;

use App\Models\ModelBerita;

class Berita extends BaseController
{
    public function index()
    {
        $model = new ModelBerita();
        $data = [
            'judul' => 'Data Berita',
            'page'  => 'v_berita',
            'berita' => $model->findAll()
        ];
        return view('v_template_backend', $data);
    }

    public function store()
    {
        $model = new ModelBerita();

        $gambar = $this->request->getFile('gambar');
        $namaGambar = '';
        if ($gambar && $gambar->isValid()) {
            $namaGambar = $gambar->getRandomName();
            $gambar->move('img', $namaGambar);
        }

        $model->save([
            'judul'   => $this->request->getPost('judul'),
            'isi'     => $this->request->getPost('isi'),
            'gambar'  => $namaGambar,
            'penulis' => $this->request->getPost('penulis')
        ]);

        return redirect()->to('/berita')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $model = new ModelBerita();
        $data = [
            'judul' => 'Edit Berita',
            'page'  => 'v_berita_edit', // langsung gunakan nama file view
            'berita' => $model->find($id),
        ];
        return view('v_template_backend', $data);
    }


    public function update($id)
    {
        $model = new ModelBerita();
        $data = $model->find($id);

        $gambar = $this->request->getFile('gambar');
        $namaGambar = $data['gambar'];

        if ($this->request->getPost('check') && $gambar->isValid()) {
            if (file_exists('img/' . $data['gambar'])) {
                unlink('img/' . $data['gambar']);
            }
            $namaGambar = $gambar->getRandomName();
            $gambar->move('img', $namaGambar);
        }

        $model->update($id, [
            'judul'   => $this->request->getPost('judul'),
            'isi'     => $this->request->getPost('isi'),
            'penulis' => $this->request->getPost('penulis'),
            'gambar'  => $namaGambar
        ]);

        return redirect()->to('/berita')->with('success', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $model = new ModelBerita();
        $data = $model->find($id);

        if ($data && file_exists('img/' . $data['gambar'])) {
            unlink('img/' . $data['gambar']);
        }

        $model->delete($id);

        return redirect()->to('/berita')->with('success', 'Data berhasil dihapus');
    }

    public function detail($id_berita)
    {
        $model = new ModelBerita();
        $berita = $model->find($id_berita);

        if (!$berita) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Berita tidak ditemukan');
        }

        $data = [
            'judul' => $berita['judul'],
            'berita' => $berita,
            'page' => 'frontend/v_detail_berita'
        ];

        return view('v_template_frontend', $data);
    }

}
