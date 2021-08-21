<?php

namespace App\Controllers;

use Config\Services;
use CodeIgniter\Config\Config;
use CodeIgniter\HTTP\Request;
use App\Models\planningModel;
use App\Models\debitModel;

class Planning extends BaseController
{

    protected $planning_model;
    protected $debit_model;
    public function __construct()
    {
        $this->planning_model = new planningModel();
        $this->debit_model = new debitModel();
    }

    public function index()
    {
        session();
        $dataPlanning = $this->planning_model->getPlanning(1);
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
                'user_id' => 1,
                'income' => $this->request->getVar('pemasukan'),
                'limit' => $this->request->getVar('limitPengeluaran'),
                'bulan' => $this->request->getVar('bulan')
            ]);
            session()->setFlashdata('tambahData', 'Data Berhasil Ditambah');
            return redirect()->to(base_url('/'));
        }


        // Hapus data debit harian
        if ($this->request->getVar('konfirmasi') === "ok") {
            $this->debit_model->resetDataDebit(1);
        }
        // dd('checkbox gk aktif');

        $this->planning_model->save([
            'id' => intval($this->request->getVar('slug-a')),
            'user_id' => 1,
            'income' => $this->request->getVar('pemasukan'),
            'limit' => $this->request->getVar('limitPengeluaran'),
            'bulan' => $this->request->getVar('bulan')
        ]);

        // cek apakah ingin mereset data pada database debit


        session()->setFlashdata('tambahData', 'Data Berhasil Ditambah');
        return redirect()->to(base_url('/'));
    }
}
