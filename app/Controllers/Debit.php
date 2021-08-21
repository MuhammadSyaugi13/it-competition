<?php

namespace App\Controllers;

use App\Models\debitModel;
use App\Models\planningModel;
use CodeIgniter\I18n\Time;

class Debit extends BaseController
{

    protected $debit_model;
    protected $debit_planning;
    public function __construct()
    {
        $this->debit_model = new debitModel();
        $this->planning_model = new planningModel();
    }

    public function index()
    {
        // data Planning
        $dataPlanning = $this->planning_model->getPlanning(1);
        $isset_debit = $this->debit_model->getDebit(1);
        $jumlahPengeluaranHarian = $this->debit_model->getPengeluaranHarian($isset_debit[0]["dataDebit"]);

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

        // buat JSON untuk dimasukan ke kolom debit
        // $debit = [
        //     [
        //         "Keterangan" => $this->request->getVar('keteranganDebit'),
        //         "Jumlah" => $this->request->getVar('debit'),
        //         "tanggal" => date("Y-m-d")
        //     ]
        // ];

        $debit = $this->debit_model->makeDataDebit([
            "dataDebit" => ($this->request->getVar('dataDebit')) ? $this->request->getVar('dataDebit') : null,
            "Keterangan" => $this->request->getVar('keteranganDebit'),
            "Jumlah" => $this->request->getVar('debit')
        ]);


        // untuk dimasukan ke Total Debit
        $totalDebit = $this->debit_model->totalDebit($this->request->getVar('debit'));

        // input ke database
        if ($mode === null) {
            $this->debit_model->save([
                'user_id' => 1,
                'dataDebit' => $debit,
                'TotalDebit' => $totalDebit,
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ]);
        } else {
            $this->debit_model->save([
                'id' => intval($this->request->getVar('slug-a')),
                'user_id' => intval($this->request->getVar('slug-b')),
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
