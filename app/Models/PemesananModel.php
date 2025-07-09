<?php

namespace App\Models;

use CodeIgniter\Model;

class PemesananModel extends Model
{
    protected $table = 'pesan';
    protected $primaryKey = 'id_pesan';
    protected $allowedFields = ['id_user','nama_lengkap', 'email', 'no_hp', 'id_wisata', 'tanggal_pesan', 'jumlah_orang', 'catatan', 'status', 'created_at'];

    public function getAll()
    {
        return $this->select('pesan.*, paketwisata.nama_wisata')
                    ->join('paketwisata', 'paketwisata.id_wisata = pesan.id_wisata', 'left')
                    ->orderBy('pesan.id_pesan', 'DESC')
                    ->findAll();
    }

    public function getAllWithWisata()
    {
        return $this->db->table('pesan')
            ->select('pesan.*, paketwisata.nama_wisata')
            ->join('paketwisata', 'paketwisata.id_wisata = pesan.id_wisata')
            ->get()->getResultArray();
    }

}
