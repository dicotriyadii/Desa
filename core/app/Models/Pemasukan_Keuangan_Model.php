<?php

namespace App\Models;

use CodeIgniter\Model;

class Pemasukan_Keuangan_Model extends Model
{
    protected $table      = 'tb_pemasukkan_keuangan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['kode_kecamatan', 'kode_desa', 'kode_dasa_wisma', 'sumber_dana_pemasukan', 'uraian_pemasukan', 'nomor_bukti_kas_pemasukan', 'jumlah_penerimaan', 'tgl'];

    protected $curl;

    public function __construct()
    {
        $this->curl =  \Config\Services::curlrequest();
    }

    public function list()
    {
        return $this->table('tb_pemasukkan_keuangan')
            ->join('tbl_kode_desa', 'tbl_kode_desa.kodeDesa = tb_pemasukkan_keuangan.kode_desa')
            ->join('tbl_kode_kecamatan', 'tbl_kode_kecamatan.kodeKecamatan = tb_pemasukkan_keuangan.kode_kecamatan')
            // ->join('tb_dasa_wisma', 'tb_dasa_wisma.id = tb_pemasukkan_keuangan.kode_dasa_wisma')
            ->orderBy('tb_pemasukkan_keuangan.id', 'DESC')
            ->get()->getResultArray();
    }

    public function post_pemasukan_keuangan($kode_nik, $kode_token, $kecamatan, $desa, $dasa_wisma, $sumber_dana_pemasukan, $uraian_pemasukan, $nomor_bukti_kas_pemasukan, $jumlah_penerimaan, $tgl)
    {
        $response = $this->curl->request('POST', 'http://localhost/ujungRambe/API/pemasukkanKeuangan', [
            'Content-Type' => 'application/json',
            'json' => [
                'nik' => $kode_nik,
                'token' => $kode_token,
                'kodeKecamatan' => $kecamatan,
                'kodeDesa' => $desa,
                'kodeDasaWisma' => $dasa_wisma,
                'sumberDanaPemasukkan' => $sumber_dana_pemasukan,
                'uraianPemasukkan' => $uraian_pemasukan,
                'nomorBuktiKasPemasukkan' =>  $nomor_bukti_kas_pemasukan,
                'jumlahPemasukkan' => $jumlah_penerimaan,
                'tgl' =>  $tgl

            ]
        ]);

        $result = json_decode($response->getBody(), TRUE);
        return $result;
    }
}
