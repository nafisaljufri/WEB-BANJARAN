<?php

namespace App\Controllers;

use App\Models\ModelPaketWisata;

class Paket extends BaseController
{
    public function index()
    {
        $model = new ModelPaketWisata();
        $data = [
            'judul' => 'Paket Wisata',
            'page' => 'v_paket_frontend',
            'paket' => $model->findAll()
        ];
        return view('v_template_frontend', $data);
    }
}
