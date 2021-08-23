<?php

namespace App\Controllers;

use App\Models\authModel;

class Auth extends BaseController
{

    public function __construct()
    {
        // $this->planning_model = new planningModel();
        $this->auth_model = new authModel();
        session();
    }

    public function index()
    {

        $data = [
            'title' => 'FP || Login',
            'css' => 'authStyle.css',
            'validation' => \Config\Services::validation(),
        ];
        return view('auth/loginView', $data);
    }

    public function masuk()
    {
        // validasi data
        if (!$this->validate([
            'username' => 'required',
            'password' => 'required',
        ])) {
            return redirect()->to(base_url() . '/Auth')->withInput();
        }

        $masuk = $this->auth_model->login($this->request->getVar());

        if ($masuk === 'salah') {
            return redirect()->to(base_url('/auth'));
        }

        // jika berhasil login
        session()->set('Login Success', true);
        session()->set('email', $masuk['email']);
        session()->set('username', $masuk['username']);
        session()->set('slug', $masuk['id']);

        return redirect()->to(base_url('/dashboard'));
    }

    public function register()
    {
        $data = [
            'title' => 'FP || Register',
            'css' => 'authStyle.css',
            'validation' => \Config\Services::validation(),
        ];
        return view('auth/registerView', $data);
    }

    public function daftar()
    {
        // validation
        if (!$this->validate([
            'username' => 'required|is_unique[user.username]',
            'email' => 'required|is_unique[user.email]|valid_email',
            'password' => 'required',
        ])) {
            return redirect()->to(base_url() . '/Auth/register')->withInput();
        }

        $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);

        $this->auth_model->save([
            "username" => $this->request->getVar('username'),
            "email" => $this->request->getVar('email'),
            "password" => $password
        ]);
        session()->setFlashdata('success', 'Registrasi Anda Berhasil');
        return redirect()->to(base_url('/auth'));
    }

    public function logout()
    {
        session()->remove('Login Success');
        session()->remove('email');
        session()->remove('username');
        session()->remove('slug');

        session()->setFlashdata('success', 'Logout Berhasil');
        return redirect()->to(base_url('/auth'));
    }
}
