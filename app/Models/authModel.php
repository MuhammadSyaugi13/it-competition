<?php

namespace App\Models;

use CodeIgniter\Model;
use phpDocumentor\Reflection\Types\Integer;
use CodeIgniter\I18n\Time;

class authModel extends Model
{
    protected $table = 'user';
    protected $useTimestamp = true;
    protected $allowedFields = ['username', 'email', 'password'];

    public function login($data)
    {

        $userData = $this->where(["username" => $data['username']])
            ->orWhere(["email" => $data['username']])->first();

        // cek apakah ada data

        if ($userData == null) {
            session()->setFlashdata('gagalLogin', 'Username/Email Salah');
            return 'salah';
        };

        // cek apakah password sesuai
        if (password_verify($data['password'], $userData['password'])) {

            return $userData;
        }
        session()->setFlashdata('passwordSalah', 'Password Salah');
        return 'salah';
    }
}
