<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPaketWisata extends Model
{
    protected $table = 'paketwisata';
    protected $primaryKey = 'id_wisata';
    protected $allowedFields = ['nama_wisata', 'deskripsi', 'harga', 'foto'];
    protected $useTimestamps = true;
}
