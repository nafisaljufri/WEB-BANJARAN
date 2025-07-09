<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
    protected $table = 'user'; // Nama tabel
    protected $primaryKey = 'id_user'; // Primary key tabel
    protected $allowedFields = ['nama_user', 'username', 'password', 'level', 'foto']; // Kolom yang boleh diisi

    // Fungsi login berdasarkan level
    public function LoginUser($username, $password, $level)
    {
        return $this->db->table($this->table)
            ->select('id_user, nama_user, username, level, foto')
            ->where([
                'username' => $username,
                'password' => $password,
                'level' => $level,
            ])->get()->getRowArray();
    }

    // Fungsi login tanpa level
    public function LoginTanpaLevel($username, $password)
    {
        return $this->db->table($this->table)
            ->select('id_user, nama_user, username, level, foto')
            ->where([
                'username' => $username,
                'password' => $password
            ])->get()->getRowArray();
    }

    public function insertUser($data)
    {
        return $this->db->table('user')->insert($data);
    }

}
