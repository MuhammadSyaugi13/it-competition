<?php

namespace App\Controllers;

use App\Models\debitModel;
use App\Models\planningModel;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->debit_model = new debitModel();
        $this->planning_model = new planningModel();
    }

    public function index()
    {
        $dataPlanning = $this->planning_model->dataPlanningDashboard(1);
        $dataDebit = $this->debit_model->dataDebitDashboard(1);

        $allData = [
            "incomeBulanan" => $dataPlanning['income'],
            "PengeluaranAll" => $dataDebit['totalDebit'],
            "sisaKeuanganAll" => $dataPlanning['income'] - $dataDebit['totalDebit'],
            "limitHarian" =>  $dataPlanning['limitHarian'],
            "debitHarian" => $dataDebit['debitHarian'],
            "sisaSaldoHarian" => $dataPlanning['limitHarian'] - $dataDebit['debitHarian'],
            "bulan" => $dataPlanning['bulan']
        ];

        $data = [
            "title" => "FP || Dashboard",
            "css" => "dashboardStyle",
            "data" => $allData,
        ];
        return view('viewDashboard', $data);
    }
}
