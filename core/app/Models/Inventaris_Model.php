<?php

namespace App\Models;

use CodeIgniter\Model;

class Inventaris_Model extends Model
{
    protected $table      = 'tb_inventaris';
    protected $primaryKey = 'id';
    protected $allowedFields = ['kode_kecamatan', 'kode_desa', 'kode_dasa_wisma', 'nama_barang', 'asal_barang', 'tgl', 'jumlah', 'tempat_penyimpanan', 'kondisi_barang', 'keterangan'];

    protected $curl;

    public function __construct()
    {
        $this->curl =  \Config\Services::curlrequest();
    }

    public function list()
    {
        return $this->table('tb_inventaris')
            ->join('tbl_kode_desa', 'tbl_kode_desa.kodeDesa = tb_inventaris.kode_desa')
            ->join('tbl_kode_kecamatan', 'tbl_kode_kecamatan.kodeKecamatan = tb_inventaris.kode_kecamatan')
            // ->join('tb_dasa_wisma', 'tb_dasa_wisma.id = tb_inventaris.kode_dasa_wisma')
            ->orderBy('tb_inventaris.id', 'DESC')
            ->get()->getResultArray();
    }

    public function post_inventaris($kode_nik, $kode_token, $kecamatan, $desa, $dasa_wisma, $nama_barang, $asal_barang, $tgl, $jumlah, $tempat_penyimpanan, $kondisi_barang, $keterangan)
    {
        $response = $this->curl->request('POST', 'http://localhost/ujungRambe/API/inventaris', [
            'Content-Type' => 'application/json',
            'json' => [
                'nik' => $kode_nik,
                'token' => $kode_token,
                'kodeKecamatan' => $kecamatan,
                'kodeDesa' => $desa,
                'kodeDasaWisma' => $dasa_wisma,
                'namaBarang' => $nama_barang,
                'asalBarang' => $asal_barang,
                'tgl' => $tgl,
                'jumlah' => $jumlah,
                'tempatPenyimpanan' => $tempat_penyimpanan,
                'kondisiBarang' =>  $kondisi_barang,
                'keterangan' =>  $keterangan
            ]
        ]);

        $result = json_decode($response->getBody(), TRUE);
        return $result;
    }
}
