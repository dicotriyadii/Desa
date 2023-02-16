<?php

namespace App\Models;

use CodeIgniter\Model;

class KriteriaRumah_Model extends Model
{
    protected $table      = 'tb_kriteria_rumah';
    protected $primaryKey = 'id';
    protected $allowedFields = ['jenis_kriteria_rumah'];

    protected $curl;

    public function __construct()
    {
        $this->curl =  \Config\Services::curlrequest();
    }


    public function list()
    {
        return $this->table('tb_kriteria_rumah')
            ->orderBy('id', 'asc')
            ->get()->getResultArray();
    }

    public function post_kriteriarumah($kode_nik, $kode_token, $kriteria_rumah)
    {
        $response = $this->curl->request('POST', 'http://localhost/ujungRambe/API/TambahKriteriaRumah', [
            'Content-Type' => 'application/json',
            'json' => [
                'nik' => $kode_nik,
                'token' => $kode_token,
                'kriteriaRumah' => $kriteria_rumah
            ]
        ]);

        $result = json_decode($response->getBody(), TRUE);
        return $result;
    }
}
