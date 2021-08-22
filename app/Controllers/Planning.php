<?php

namespace App\Controllers;

use Config\Services;
use CodeIgniter\Config\Config;
use CodeIgniter\HTTP\Request;
use App\Models\planningModel;
use App\Models\debitModel;
use App\Models\dashboardModel;

class Planning extends BaseController
{

    protected $planning_model;
    protected $debit_model;
    protected $dataUser;
    public function __construct()
    {
        $this->planning_model = new planningModel();
        $this->debit_model = new debitModel();
        $this->dashboard_model = new dashboardModel();

        $this->dataUser = $this->dashboard_model->getUser(session()->get('email'));
    }

    public function index()
    {
        session();
        // $dataUser = $this->dashboard_model->getUser(session()->get('email'));

        $dataPlanning = $this->planning_model->getPlanning($this->dataUser['id']);
        $data = [
            "title" => "FP || Planning",
            "css" => "planningStyle",
            'validation' => \Config\Services::validation(),
            "dataPlanning" => $dataPlanning
        ];
        return view('viewPlanning', $data);
    }

    public function submit($mode = null)
    {

        // Validation 
        if (!$this->validate([
            'pemasukan' => 'required',
            'limitPengeluaran' => 'required',
        ])) {
            return redirect()->to(base_url() . '/planning')->withInput();
        }


        // Input data
        if ($mode === null) {

            $this->planning_model->save([
                'user_id' => $this->dataUser['id'],
                'income' => $this->request->getVar('pemasukan'),
                'limit' => $this->request->getVar('limitPengeluaran'),
                'bulan' => $this->request->getVar('bulan')
            ]);
            session()->setFlashdata('tambahData', 'Data Berhasil Ditambah');
            return redirect()->to(base_url('/'));
        }


        // Hapus data debit harian
        if ($this->request->getVar('konfirmasi') === "ok") {
            $this->debit_model->resetDataDebit($this->dataUser['id']);
        }
        // dd('checkbox gk aktif');

        $this->planning_model->save([
            'id' => $this->planning_model->getPlanning($this->dataUser['id']),
            'user_id' => $this->dataUser['id'],
            'income' => $this->request->getVar('pemasukan'),
            'limit' => $this->request->getVar('limitPengeluaran'),
            'bulan' => $this->request->getVar('bulan')
        ]);

        // cek apakah ingin mereset data pada database debit


        session()->setFlashdata('tambahData', 'Data Berhasil Ditambah');
        return redirect()->to(base_url('/'));
    }
}
