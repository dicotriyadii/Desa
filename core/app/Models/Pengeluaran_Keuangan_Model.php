<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengeluaran_Keuangan_Model extends Model
{
    protected $table      = 'tb_pengeluaran_keuangan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['kode_kecamatan', 'kode_desa', 'kode_dasa_wisma', 'sumber_dana_pengeluaran', 'uraian_pengeluaran', 'nomor_bukti_kas_pengeluaran', 'jumlah_pengeluaran', 'tgl'];

    protected $curl;

    public function __construct()
    {
        $this->curl =  \Config\Services::curlrequest();
    }

    public function list()
    {
        return $this->table('tb_pengeluaran_keuangan')
            ->join('tbl_kode_desa', 'tbl_kode_desa.kodeDesa = tb_pengeluaran_keuangan.kode_desa')
            ->join('tbl_kode_kecamatan', 'tbl_kode_kecamatan.kodeKecamatan = tb_pengeluaran_keuangan.kode_kecamatan')
            // ->join('tb_dasa_wisma', 'tb_dasa_wisma.id = tb_pengeluaran_keuangan.kode_dasa_wisma')
            ->orderBy('tb_pengeluaran_keuangan.id', 'DESC')
            ->get()->getResultArray();
    }

    public function post_pengeluaran_keuangan($kode_nik, $kode_token, $kecamatan, $desa, $dasa_wisma, $sumber_dana_pengeluaran, $uraian_pengeluaran, $nomor_bukti_kas_pengeluaran, $jumlah_pengeluaran, $tgl)
    {
        $response = $this->curl->request('POST', 'http://localhost/ujungRambe/API/pengeluaranKeuangan', [
            'Content-Type' => 'application/json',
            'json' => [
                'nik' => $kode_nik,
                'token' => $kode_token,
                'kodeKecamatan' => $kecamatan,
                'kodeDesa' => $desa,
                'kodeDasaWisma' => $dasa_wisma,
                'sumberDanaPengeluaran' => $sumber_dana_pengeluaran,
                'uraianPengeluaran' => $uraian_pengeluaran,
                'nomorBuktiKasPengeluaran' => $nomor_bukti_kas_pengeluaran,
                'jumlahPengeluaran' => $jumlah_pengeluaran,
                'tgl' =>  $tgl

            ]
        ]);

        $result = json_decode($response->getBody(), TRUE);
        return $result;
    }
}
