<?php

namespace App\Models;

use CodeIgniter\Model;

class DasaWisma_Model extends Model
{
    protected $table      = 'tb_dasa_wisma';
    protected $primaryKey = 'id';
    protected $allowedFields = ['kode_kecamatan', 'kode_desa', 'kode_dusun', 'RT', 'RW', 'nama_dasa_wisma'];

    protected $curl;

    public function __construct()
    {
        $this->curl =  \Config\Services::curlrequest();
    }

    public function list($dusun,$kecamatan,$desa)
    {
        return $this->table('tb_dasa_wisma')
            ->join('tbl_kode_desa', 'tbl_kode_desa.kodeDesa = tb_dasa_wisma.kode_desa')
            ->join('tbl_kode_kecamatan', 'tbl_kode_kecamatan.kodeKecamatan = tb_dasa_wisma.kode_kecamatan')
            ->join('tbl_dusun', 'tbl_dusun.idDusun = tb_dasa_wisma.kode_dusun')
            ->orderBy('id', 'DESC')
            ->where('tb_dasa_wisma.kode_desa',$desa)
            ->where('tb_dasa_wisma.kode_kecamatan',$kecamatan)
            ->where('tb_dasa_wisma.kode_dusun',$dusun)
            ->get()->getResultArray();
    }

    public function post_dasa_wisma($nik, $token, $kode_kecamatan, $kode_desa, $kode_dusun, $rt, $rw, $nama_dasa_wisma)
    {
        $response = $this->curl->request('POST', 'http://localhost/ujungRambe/API/dasawisma', [
            'Content-Type' => 'application/json',
            'json' => [
                'nik' => $nik,
                'token' => $token,
                'kodeKecamatan' => $kode_kecamatan,
                'kodeDesa' => $kode_desa,
                'kodeDusun' => $kode_dusun,
                'RT' => $rt,
                'RW' => $rw,
                'namaDasaWisma' => $nama_dasa_wisma
            ]
        ]);

        $result = json_decode($response->getBody(), TRUE);
        return $result;
    }
}
