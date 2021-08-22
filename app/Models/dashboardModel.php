<?php

namespace App\Models;

use CodeIgniter\Model;
use phpDocumentor\Reflection\Types\Integer;
use CodeIgniter\I18n\Time;

class dashboardModel extends Model
{
    protected $table = 'user';
    protected $useTimestamp = true;
    // protected $allowedFields = ['id', 'user_id', 'dataDebit', 'TotalDebit', 'created_at', 'updated_at'];

    public function getUser($email)
    {
        $data = $this->where('email', $email)->first();
        return $data = ["id" => $data['id'], "username" => $data['username']];
    }
}
