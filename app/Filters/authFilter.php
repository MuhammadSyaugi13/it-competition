<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class authFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->get('Login Success') !== true) {
            session()->setFlashdata('gagalLogin', 'Anda Belum Login, Silahkan Login Terlebih Dahulu !');
            return redirect()->to(base_url('Auth'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if (session()->get('Login Success') !== true) {
            return redirect()->to(base_url('Dashboard'));
        }
    }
}
