<?php

namespace App\Controllers;

use App\Models\ModelVideo;

class Video extends BaseController
{
    public function index()
    {
        $model = new ModelVideo();
        $data = [
            'judul' => 'Data Video',
            'page'  => 'v_video',
            'video' => $model->findAll()
        ];
        return view('v_template_backend', $data);
    }

    public function store()
    {
        $model = new ModelVideo();

        $model->save([
            'judul'      => $this->request->getPost('judul'),
            'url_video'  => $this->request->getPost('url_video'),
            'keterangan' => $this->request->getPost('keterangan')
        ]);

        return redirect()->to('/video')->with('success', 'Data berhasil ditambahkan');
    }

    public function delete($id)
    {
        $model = new ModelVideo();
        $model->delete($id);
        return redirect()->to('/video')->with('success', 'Data berhasil dihapus');
    }

    public function edit($id)
    {
        $model = new ModelVideo();
        $data = [
            'judul' => 'Edit Video',
            'page'  => 'v_video_edit',
            'video' => $model->find($id)
        ];
        return view('v_template_backend', $data);
    }

    public function update($id)
    {
        $model = new ModelVideo();
        $model->update($id, [
            'judul'      => $this->request->getPost('judul'),
            'url_video'  => $this->request->getPost('url_video'),
            'keterangan' => $this->request->getPost('keterangan')
        ]);
        return redirect()->to('/video')->with('success', 'Data berhasil diupdate');
    }
}
