<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAuth;
use Google_Client;
use Google_Service_Oauth2;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->ModelAuth = new ModelAuth();
    }

    public function index()
    {
        return view('v_login', [
            'judul' => 'login',
            'validation' => \Config\Services::validation()
        ]);
    }

    public function login()
    {
        if ($this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong!']
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => ['required' => '{field} tidak boleh kosong!']
            ],
        ])) {
            $username = $this->request->getPost('username');
            $password = md5($this->request->getPost('password'));

            // cari user tanpa level
            $cek = $this->ModelAuth->LoginTanpaLevel($username, $password);
            if ($cek) {
                session()->set([
                    'id_user'   => $cek['id_user'], // penting!
                    'level'     => $cek['level'],
                    'nama_user' => $cek['nama_user'],
                    'foto'      => $cek['foto'],
                    'logged_in' => true
                ]);

                // arahkan berdasarkan level
                if ($cek['level'] == 1) {
                    return redirect()->to('admin');
                } else {
                    return redirect()->to('/');
                }
            } else {
                            session()->setFlashData('pesan', 'Login Gagal, Username atau Password salah');
                return redirect()->to('auth');
            }
        } else {
            return redirect()->to('auth')->withInput();
        }
    }

        public function logout() {
        session()->destroy();
        return redirect()->to('auth');
    }

    public function register()
    {
        return view('v_register', [
            'judul' => 'Register',
            'validation' => \Config\Services::validation()
        ]);
    }

    public function simpan_register()
    {
        if ($this->validate([
            'nama_user' => 'required',
            'username' => 'required|is_unique[user.username]',
            'password' => 'required|min_length[4]',
        ])) {
            $data = [
                'nama_user' => $this->request->getPost('nama_user'),
                'username' => $this->request->getPost('username'),
                'password' => md5($this->request->getPost('password')),
                'level' => 2, // member
            ];
            $this->ModelAuth->insertUser($data);
            return redirect()->to('auth')->with('pesan', 'Registrasi berhasil, silakan login.');
        } else {
            return redirect()->to('auth/register')->withInput()->with('validation', \Config\Services::validation());
        }
    }

        public function insert($data)
        {
            return $this->db->table('user')->insert($data);
        }

        public function loginGoogle()
    {
        $client = new Google_Client();
        $client->setClientId('72015668494-blhna32635fr5ot0b0ut17st74n1u65s.apps.googleusercontent.com');
        $client->setClientSecret('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');
        $client->setRedirectUri(base_url('auth/googleCallback'));
        $client->addScope('email');
        $client->addScope('profile');

        return redirect()->to($client->createAuthUrl());
    }

    public function googleCallback()
    {
        $client = new \Google_Client();
        $client->setClientId('72015668494-blhna32635fr5ot0b0ut17st74n1u65s.apps.googleusercontent.com');
        $client->setClientSecret('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');
        $client->setRedirectUri(base_url('auth/googleCallback'));

        if ($this->request->getVar('code')) {
            $token = $client->fetchAccessTokenWithAuthCode($this->request->getVar('code'));

            if (!isset($token['error'])) {
                $client->setAccessToken($token['access_token']);
                $oauth = new \Google_Service_Oauth2($client);
                $userData = $oauth->userinfo->get();

                $userModel = new \App\Models\ModelAuth();
                // Cek apakah user dengan email ini sudah terdaftar
                $cek = $userModel->where('username', $userData->email)->first();

                if (!$cek) {
                    // Jika belum ada, daftarkan user baru
                    $userModel->insertUser([
                        'nama_user' => $userData->name,
                        'username'  => $userData->email,
                        'password'  => md5('google_login'), // password default
                        'level'     => 2,
                        'foto'      => $userData->picture
                    ]);
                    $cek = $userModel->where('username', $userData->email)->first(); // ambil lagi
                }

                // ✅ Set session yang konsisten
                session()->set([
                    'id_user'   => $cek['id_user'],
                    'level'     => $cek['level'],
                    'nama_user' => $cek['nama_user'],
                    'foto'      => $cek['foto'],
                    'logged_in' => true
                ]);

                // Arahkan ke halaman sesuai level
                if ($cek['level'] == 1) {
                    return redirect()->to('/admin');
                } else {
                    return redirect()->to('/');
                }
            }
        }

        return redirect()->to('/login')->with('error', 'Login Google gagal.');
    }

}
