<?php

namespace App\Controllers;

class Debit extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "FP || Catatan Pengeluaran",
            "css" => "debitStyle"
        ];
        return view('viewDebit', $data);
    }
}
