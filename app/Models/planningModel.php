<?php

namespace App\Models;

use CodeIgniter\Model;
use phpDocumentor\Reflection\Types\Integer;

class planningModel extends Model
{
    protected $table = 'planning';
    protected $useTimestamp = true;
    protected $allowedFields = ['user_id', 'income', 'limit', 'bulan'];

    public function getPlanning($user_id = null)
    {
        $data = $this->where('user_id', $user_id)->find();
        if ($data == []) {
            return null;
        }
        return $data[0];
    }

    public function dataPlanningDashboard($user_id)
    {
        // query data2 planning ke database

        $dataPlanning = $this->getPlanning($user_id);

        if ($dataPlanning == null) {
            session()->setFlashdata('planning', 'Anda belum membuat Perencanaan Keuangan, silahkan ke menu Perencanaan Keuangan');
            return [
                "income" => 0,
                "limitHarian" => 0,
                "bulan" => '-'
            ];
        }

        return [
            "income" => intval($dataPlanning['income']),
            "limitHarian" => intval($dataPlanning['limit']),
            "bulan" => $dataPlanning['bulan']
        ];
    }
}
