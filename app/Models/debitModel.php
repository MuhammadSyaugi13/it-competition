<?php

namespace App\Models;

use CodeIgniter\Model;
use phpDocumentor\Reflection\Types\Integer;
use CodeIgniter\I18n\Time;

class debitModel extends Model
{
    protected $table = 'debit';
    protected $useTimestamp = true;
    protected $allowedFields = ['id', 'user_id', 'dataDebit', 'TotalDebit', 'created_at', 'updated_at'];

    public function getDebit($user_id)
    {
        $data = $this->where(['user_id' => $user_id])->find();

        if ($data == []) {
            return false;
        }
        return $data;
    }

    public function totalDebit(string $debit)
    {
        // ubah dari string ke integer
        $debit = intval($debit);

        // Ambil data total data dari database
        $TotalDebit = $this->getDebit(1);

        // jika data debit user tidak kosong
        if ($TotalDebit !== false) {
            return $TotalDebit = intval($TotalDebit[0]['TotalDebit'] + $debit);
        }

        // jika data debit user  kosong
        return $debit;
    }

    public function makeDataDebit(array $data)
    {
        if ($data['dataDebit'] !== null) {
            $dataDebit = json_decode($data['dataDebit']);
        } else {
            $dataDebit = [];
        }

        $dataDebitBaru = [
            "Keterangan" => $data["Keterangan"],
            "Jumlah" => $data["Jumlah"],
            "tanggal" => date("Y-m-d")
        ];
        array_unshift($dataDebit, $dataDebitBaru);
        return json_encode($dataDebit);
    }

    public function getPengeluaranHarian($data)
    {
        $data = json_decode($data);


        if (isset($data[0]->Jumlah)) {

            $totalPengeluaranHarian = 0;

            foreach ($data as $d) {

                if (!isset($d->Jumlah)) {
                    return $totalPengeluaranHarian;
                }

                // jumlahkan semua pengeluaran hari ini
                $totalPengeluaranHarian = intval($d->Jumlah) + $totalPengeluaranHarian;

                // cek apakah tanggalnya sama
                if ($d->tanggal !== date("Y-m-d")) {
                    return $totalPengeluaranHarian;
                }
            }
            return $totalPengeluaranHarian;
        }
    }

    public function resetDataDebit($user_id)
    {
        $dataDebit = $this->getDebit($user_id)[0];

        $this->save([
            'id' => $dataDebit['id'],
            'user_id' => $user_id,
            'dataDebit' => '[{}]',
            'TotalDebit' => 0,
            'created_at' => $dataDebit['created_at'],
            'updated_at' => Time::now()
        ]);

        d('ok');
    }

    public function dataDebitDashboard($user_id)
    {
        // query data debit ke database
        $dataDebit = $this->getDebit($user_id);
        // dd();
        if ($dataDebit === false) {
            return [
                "totalDebit" => 0,
                "debitHarian" => 0,
            ];
        }


        // pengeluaran Harian
        $dataPengeluaranHarian = $this->getPengeluaranHarian($dataDebit[0]['dataDebit']);



        return [
            "totalDebit" => intval($dataDebit[0]['TotalDebit']),
            "debitHarian" => $dataPengeluaranHarian,
        ];
    }
}
