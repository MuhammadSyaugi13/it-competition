<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "FP || Dashboard",
            "css" => "dashboardStyle"
        ];
        return view('viewDashboard', $data);
    }
}
