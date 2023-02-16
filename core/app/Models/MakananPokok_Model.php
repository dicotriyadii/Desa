<?php

namespace App\Models;

use CodeIgniter\Model;

class MakananPokok_Model extends Model
{
    protected $table      = 'tb_makanan_pokok';
    protected $primaryKey = 'id';
    protected $allowedFields = ['makanan_pokok'];

    protected $curl;

    public function __construct()
    {
        $this->curl =  \Config\Services::curlrequest();
    }

    public function list()
    {
        return $this->table('tb_makanan_pokok')
            ->orderBy('id', 'asc')
            ->get()->getResultArray();
    }

    public function post_makanan_pokok($kode_nik, $kode_token, $jenis_makanan_pokok)
    {
        $response = $this->curl->request('POST', 'http://localhost/ujungRambe/API/tambahMakananPokok', [
            'Content-Type' => 'application/json',
            'json' => [
                'nik' => $kode_nik,
                'token' => $kode_token,
                'makananPokok' => $jenis_makanan_pokok
            ]
        ]);

        $result = json_decode($response->getBody(), TRUE);
        return $result;
    }
}
