<?php

namespace App\Controllers;

class Planning extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "FP || Planning",
            "css" => "planningStyle"
        ];
        return view('viewPlanning', $data);
    }
}
