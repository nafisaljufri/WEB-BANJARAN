<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBerita extends Model
{
    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    protected $allowedFields = ['judul', 'isi', 'gambar', 'penulis', 'created_at'];
    protected $useTimestamps = false; // Karena tidak ada field updated_at
}
