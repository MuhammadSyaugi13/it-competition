<?php

namespace App\Controllers;

use App\Models\debitModel;
use App\Models\planningModel;
use CodeIgniter\I18n\Time;
use App\Models\dashboardModel;

class Debit extends BaseController
{

    protected $debit_model;
    protected $debit_planning;
    protected $dashboard_planning;
    protected $dataUser;
    public function __construct()
    {
        $this->debit_model = new debitModel();
        $this->planning_model = new planningModel();
        $this->dashboard_model = new dashboardModel();

        $this->dataUser = $this->dashboard_model->getUser(session()->get('email'));
    }

    public function index()
    {
        // data Planning
        $dataPlanning = $this->planning_model->getPlanning($this->dataUser['id']);
        $isset_debit = $this->debit_model->getDebit($this->dataUser['id']);
        $jumlahPengeluaranHarian = $this->debit_model->getPengeluaranHarian($isset_debit);

        // dd($dataPlanning);
        $data = [
            "title" => "FP || Catatan Pengeluaran",
            "css" => "debitStyle",
            "cekIssetDebit" => $isset_debit,
            "dataPlanning" => $dataPlanning,
            "jumlahPengeluaranHarian" => $jumlahPengeluaranHarian
        ];
        return view('viewDebit', $data);
    }

    public function insert($mode = null)
    {
        // data debit
        $debit = $this->debit_model->makeDataDebit([
            "dataDebit" => ($this->request->getVar('dataDebit')) ? $this->request->getVar('dataDebit') : null,
            "Keterangan" => $this->request->getVar('keteranganDebit'),
            "Jumlah" => $this->request->getVar('debit')
        ]);


        // untuk dimasukan ke Total Debit
        $totalDebit = $this->debit_model->totalDebit($this->request->getVar('debit'), $this->dataUser['id']);

        // input ke database
        if ($mode === null) {
            $this->debit_model->save([
                'user_id' => $this->dataUser['id'],
                'dataDebit' => $debit,
                'TotalDebit' => $totalDebit,
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ]);
        } else {
            $this->debit_model->save([
                'id' => $this->debit_model->getDebit($this->dataUser['id'])[0]['id'],
                'user_id' => $this->dataUser['id'],
                'dataDebit' => $debit,
                'TotalDebit' => $totalDebit,
                'created_at' => intval($this->request->getVar('created_at')),
                'updated_at' => Time::now()
            ]);
        }
        session()->setFlashdata('tambahData', 'Data Berhasil Ditambah');
        return redirect()->to(base_url('/'));
    }
}
