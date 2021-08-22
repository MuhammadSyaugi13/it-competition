<?php

namespace App\Controllers;

use App\Models\debitModel;
use App\Models\planningModel;
use App\Models\dashboardModel;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->debit_model = new debitModel();
        $this->planning_model = new planningModel();
        $this->dashboard_model = new dashboardModel();
    }

    public function index()
    {
        $dataUser = $this->dashboard_model->getUser(session()->get('email'));

        $dataPlanning = $this->planning_model->dataPlanningDashboard($dataUser['id']);
        $dataDebit = $this->debit_model->dataDebitDashboard(intval($dataUser['id']));

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
