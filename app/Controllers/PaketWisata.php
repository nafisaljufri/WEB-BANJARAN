<?php

namespace App\Controllers;

use App\Models\ModelPaketWisata;

class PaketWisata extends BaseController
{
    public function index()
    {
        $model = new ModelPaketWisata();
        $data = [
            'judul' => 'Data Paket Wisata',
            'page' => 'v_paket_wisata',
            'paket' => $model->findAll()
        ];
        return view('v_template_backend', $data);
    }

    public function store()
    {
        $model = new ModelPaketWisata();

        $foto = $this->request->getFile('foto');
        $namaFoto = '';
        if ($foto && $foto->isValid()) {
            $ext = $foto->getExtension();
            $slug = url_title($this->request->getPost('nama'), '_', true);
            $namaFoto = $slug . '.' . $ext;

            // Hindari overwrite file yang sama
            if (file_exists('img/' . $namaFoto)) {
                $namaFoto = $slug . '_' . time() . '.' . $ext;
            }

            $foto->move('img', $namaFoto);
        }

        $model->save([
            'nama_wisata' => $this->request->getPost('nama'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'harga'       => $this->request->getPost('harga'),
            'foto'        => $namaFoto
        ]);

        return redirect()->to('/paket-wisata')->with('success', 'Data berhasil ditambahkan');
    }

    public function update($id)
    {
        $model = new ModelPaketWisata();
        $data = $model->find($id);

        $foto = $this->request->getFile('foto');
        $namaFoto = $data['foto'];

        if ($this->request->getPost('check') && $foto->isValid()) {
            if (file_exists('img/' . $data['foto'])) {
                unlink('img/' . $data['foto']);
            }

            $ext = $foto->getExtension();
            $slug = url_title($this->request->getPost('nama'), '_', true);
            $namaFoto = $slug . '.' . $ext;

            if (file_exists('img/' . $namaFoto)) {
                $namaFoto = $slug . '_' . time() . '.' . $ext;
            }

            $foto->move('img', $namaFoto);
        }

        $model->update($id, [
            'nama_wisata' => $this->request->getPost('nama'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'harga'       => $this->request->getPost('harga'),
            'foto'        => $namaFoto
        ]);

        return redirect()->to('/paket-wisata')->with('success', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $model = new ModelPaketWisata();
        $data = $model->find($id);

        if ($data && file_exists('img/' . $data['foto'])) {
            unlink('img/' . $data['foto']);
        }

        $model->delete($id);

        return redirect()->to('/paket-wisata')->with('success', 'Data berhasil dihapus');
    }

    public function edit($id)
    {
        $model = new ModelPaketWisata();
        $data = [
            'judul' => 'Edit Paket Wisata',
            'page' => 'v_paket_wisata_edit',
            'paket' => $model->find($id)
        ];
        return view('v_template_backend', $data);
    }

}
