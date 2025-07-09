<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelGaleri extends Model
{
    protected $table = 'galeri';
    protected $primaryKey = 'id_gallery';
    protected $allowedFields = ['judul', 'foto', 'keterangan'];
    protected $useTimestamps = true;
}
