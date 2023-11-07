<?php

namespace App\Models;

use CodeIgniter\Model;

class User_Model extends Model
{
    protected $table      = 'tbl_user_dasawisma';
    protected $primaryKey = 'idUserDasawisma';
    protected $allowedFields = ['nik','kodeKecamatanDasawisma','kodeDesaDasawisma','kodeDusunDasawisma', 'jabatan', 'idDasawisma', 'jabatan'];

    protected $curl;

    public function __construct()
    {
        $this->curl =  \Config\Services::curlrequest();
    }

    public function list($desa,$kecamatan)
    {
        return $this->table('tbl_user_dasawisma')
            ->join('tbl_warga', 'tbl_warga.nomorIndukKependudukan = tbl_user_dasawisma.nik')
            ->join('tb_dasa_wisma', 'tb_dasa_wisma.id = tbl_user_dasawisma.idDasawisma')
            ->orderBy('tbl_user_dasawisma.idUserDasawisma', 'DESC')
            ->where('tbl_user_dasawisma.kodeDesa',$desa)
            ->where('tbl_user_dasawisma.kodeKecamatan',$kecamatan)
            ->get()->getResultArray();
    }

    public function post_anggota_pkk($kode_nik, $kode_token, $nik, $jabatan)
    {
        $response = $this->curl->request('POST', 'http://localhost/ujungRambe/API/TambahTempatSampah', [
            'Content-Type' => 'application/json',
            'json' => [
                'nik' => $kode_nik,
                'token' => $kode_token,
            ]
        ]);

        $result = json_decode($response->getBody(), TRUE);
        return $result;
    }
}
