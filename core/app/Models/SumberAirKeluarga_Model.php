<?php

namespace App\Models;

use CodeIgniter\Model;

class SumberAirKeluarga_Model extends Model
{
    protected $table      = 'tb_sumber_air_keluarga';
    protected $primaryKey = 'id';
    protected $allowedFields = ['jenis_sumber_air'];

    protected $curl;

    public function __construct()
    {
        $this->curl =  \Config\Services::curlrequest();
    }


    public function list()
    {
        return $this->table('tb_sumber_air_keluarga')
            ->orderBy('id', 'asc')
            ->get()->getResultArray();
    }

    public function post_sumber_air($kode_nik, $kode_token, $jenis_sumber_air)
    {
        $response = $this->curl->request('POST', 'http://localhost/ujungRambe/API/TambahSumberAirKeluarga', [
            'Content-Type' => 'application/json',
            'json' => [
                'nik' => $kode_nik,
                'token' => $kode_token,
                'sumberAirKeluarga' => $jenis_sumber_air
            ]
        ]);

        $result = json_decode($response->getBody(), TRUE);
        return $result;
    }
}
