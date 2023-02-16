<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisKegiatan_Model extends Model
{
    protected $table      = 'tb_kegiatan_pkk_yg_diikuti';
    protected $primaryKey = 'id';
    protected $allowedFields = ['jenis_kegiatan'];

    protected $curl;

    public function __construct()
    {
        $this->curl =  \Config\Services::curlrequest();
    }

    public function list()
    {
        return $this->table('tb_kegiatan_pkk_yg_diikuti')
            ->orderBy('id', 'asc')
            ->get()->getResultArray();
    }

    public function post_jenisKegiatan($kode_nik, $kode_token, $jenis_kegiatan)
    {
        $response = $this->curl->request('POST', 'http://localhost/ujungRambe/API/TambahKegiatanPKK', [
            'Content-Type' => 'application/json',
            'json' => [
                'nik' => $kode_nik,
                'token' => $kode_token,
                'kegiatanPKK' => $jenis_kegiatan
            ]
        ]);

        $result = json_decode($response->getBody(), TRUE);
        return $result;
    }
}
