<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_bayar';
    protected $allowedFields = ['id_pesan', 'tanggal_bayar', 'jumlah_bayar', 'metode', 'bukti_bayar', 'status'];

    public function getAllWithPesanan()
    {
        return $this->select('pembayaran.*, pesan.nama_lengkap')
                    ->join('pesan', 'pesan.id_pesan = pembayaran.id_pesan', 'left')
                    ->orderBy('tanggal_bayar', 'DESC')
                    ->findAll();
    }

    public function getLaporan($mulai = null, $akhir = null)
    {
        $builder = $this->db->table('pembayaran');
        $builder->select('pembayaran.*, user.nama_user, pesan.tanggal_pesan, pesan.jumlah_orang');
        $builder->join('pesan', 'pesan.id_pesan = pembayaran.id_pesan');
        $builder->join('user', 'user.id_user = pesan.id_user');

        // Tambahkan waktu agar sesuai dengan tipe datetime
        if ($mulai && $akhir) {
            $builder->where('pembayaran.tanggal_bayar >=', $mulai . ' 00:00:00');
            $builder->where('pembayaran.tanggal_bayar <=', $akhir . ' 23:59:59');
        }

        $builder->orderBy('pembayaran.tanggal_bayar', 'DESC');
        return $builder->get()->getResultArray();
    }

}
