<?php

namespace App\Controllers;

use App\Models\ModelGaleri;

class Galeri extends BaseController
{
    public function index()
    {
        $model = new ModelGaleri();
        $data = [
            'judul' => 'Data Galeri',
            'page'  => 'v_galeri',
            'galeri' => $model->findAll()
        ];
        return view('v_template_backend', $data);
    }

    public function store()
    {
        $model = new ModelGaleri();

        $foto = $this->request->getFile('foto');
        $namaFoto = '';
        if ($foto && $foto->isValid()) {
            $ext = $foto->getExtension();
            $slug = url_title($this->request->getPost('judul'), '_', true);
            $namaFoto = $slug . '.' . $ext;

            if (file_exists('img/' . $namaFoto)) {
                $namaFoto = $slug . '_' . time() . '.' . $ext;
            }

            $foto->move('img', $namaFoto);
        }

        $model->save([
            'judul'      => $this->request->getPost('judul'),
            'keterangan' => $this->request->getPost('keterangan'),
            'foto'       => $namaFoto
        ]);

        return redirect()->to('/galeri')->with('success', 'Data berhasil ditambahkan');
    }

    public function delete($id)
    {
        $model = new ModelGaleri();
        $data = $model->find($id);

        if ($data && file_exists('img/' . $data['foto'])) {
            unlink('img/' . $data['foto']);
        }

        $model->delete($id);
        return redirect()->to('/galeri')->with('success', 'Data berhasil dihapus');
    }

    public function edit($id)
    {
        $model = new ModelGaleri();
        $data = [
            'judul' => 'Edit Galeri',
            'page'  => 'v_galeri_edit',
            'galeri' => $model->find($id)
        ];
        return view('v_template_backend', $data);
    }

    public function update($id)
    {
        $model = new ModelGaleri();
        $dataLama = $model->find($id);

        $foto = $this->request->getFile('foto');
        $namaFoto = $dataLama['foto']; // default: pakai foto lama

        if ($foto && $foto->isValid()) {
            $ext = $foto->getExtension();
            $slug = url_title($this->request->getPost('judul'), '_', true);
            $namaFoto = $slug . '.' . $ext;

            if (file_exists('img/' . $namaFoto)) {
                $namaFoto = $slug . '_' . time() . '.' . $ext;
            }

            $foto->move('img', $namaFoto);

            // Hapus foto lama
            if (!empty($dataLama['foto']) && file_exists('img/' . $dataLama['foto'])) {
                unlink('img/' . $dataLama['foto']);
            }
        }

        $model->update($id, [
            'judul'      => $this->request->getPost('judul'),
            'keterangan' => $this->request->getPost('keterangan'),
            'foto'       => $namaFoto,
        ]);

        return redirect()->to('/galeri')->with('success', 'Data berhasil diperbarui');
    }

}
