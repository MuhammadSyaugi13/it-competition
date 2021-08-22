<?php

namespace App\Models;

use CodeIgniter\Model;
use phpDocumentor\Reflection\Types\Integer;

class planningModel extends Model
{
    protected $table = 'planning';
    protected $useTimestamp = true;
    protected $allowedFields = ['user_id', 'income', 'limit', 'bulan'];

    public function getPlanning($email = null)
    {
        // $data = $this->where('user_id', $user_id)->find();
        $data = $this->where('email', $email)->find();
        if ($data == []) {
            return null;
        }
        return $data[0];
    }

    public function dataPlanningDashboard($email)
    {
        // query data2 planning ke database
        $dataPlanning = $this->getPlanning($email);

        return [
            "income" => intval($dataPlanning['income']),
            "limitHarian" => intval($dataPlanning['limit']),
            "bulan" => $dataPlanning['bulan']
        ];
    }
}
