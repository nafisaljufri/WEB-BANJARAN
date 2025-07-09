<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelVideo extends Model
{
    protected $table            = 'video';
    protected $primaryKey       = 'id_video';
    protected $allowedFields    = ['judul', 'url_video', 'keterangan'];
    protected $useTimestamps    = true;
}
