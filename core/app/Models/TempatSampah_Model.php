<?php

namespace App\Models;

use CodeIgniter\Model;

class TempatSampah_Model extends Model
{
    protected $table      = 'tb_tempat_sampah';
    protected $primaryKey = 'id';
    protected $allowedFields = ['jenis_tempat_sampah'];

    protected $curl;

    public function __construct()
    {
        $this->curl =  \Config\Services::curlrequest();
    }

    public function list()
    {
        return $this->table('tb_tempat_sampah')
            ->orderBy('id', 'asc')
            ->get()->getResultArray();
    }

    public function post_tempat_sampah($kode_nik, $kode_token, $jenis_tempat_sampah)
    {
        $response = $this->curl->request('POST', 'http://localhost/ujungRambe/API/TambahTempatSampah', [
            'Content-Type' => 'application/json',
            'json' => [
                'nik' => $kode_nik,
                'token' => $kode_token,
                'tempatSampah' => $jenis_tempat_sampah
            ]
        ]);

        $result = json_decode($response->getBody(), TRUE);
        return $result;
    }
}
