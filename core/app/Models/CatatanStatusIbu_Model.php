<?php

namespace App\Models;

use CodeIgniter\Model;

class CatatanStatusIbu_Model extends Model
{
    protected $table      = 'tb_catatan_status_ibu';
    protected $primaryKey = 'id';
    protected $allowedFields = ['kode_kecamatan', 'kode_desa', 'kode_dasa_wisma', 'nik_ibu', 'nama ibu', 'nama_suami', 'sumber_air', 'status', 'tgl'];

    protected $curl;

    public function __construct()
    {
        $this->curl =  \Config\Services::curlrequest();
    }

    public function list()
    {
        return $this->table('tb_catatan_status_ibu')
            ->join('tbl_kode_desa', 'tbl_kode_desa.kodeDesa = tb_catatan_status_ibu.kode_desa')
            ->join('tbl_kode_kecamatan', 'tbl_kode_kecamatan.kodeKecamatan = tb_catatan_status_ibu.kode_kecamatan')
            ->join('tb_dasa_wisma', 'tb_dasa_wisma.id= tb_catatan_status_ibu.kode_dasa_wisma')
            ->join('tbl_warga', 'tbl_warga.nomorIndukKependudukan = tb_catatan_status_ibu.nik_ibu')
            ->join('tb_catatan_kelahiran', 'tb_catatan_kelahiran.catatan_status_ibu_id= tb_catatan_status_ibu.id')
            ->orderBy('tb_catatan_status_ibu.id', 'DESC')
            ->get()->getResultArray();
    }

    public function list_per_user_kelahiran($id)
    {
        return $this->table('tb_catatan_status_ibu')
            ->join('tbl_kode_desa', 'tbl_kode_desa.kodeDesa = tb_catatan_status_ibu.kode_desa')
            ->join('tbl_kode_kecamatan', 'tbl_kode_kecamatan.kodeKecamatan = tb_catatan_status_ibu.kode_kecamatan')
            ->join('tb_dasa_wisma', 'tb_dasa_wisma.id= tb_catatan_status_ibu.kode_dasa_wisma')
            ->join('tbl_warga', 'tbl_warga.nomorIndukKependudukan = tb_catatan_status_ibu.nik_ibu')
            ->join('tb_catatan_kelahiran', 'tb_catatan_kelahiran.catatan_status_ibu_id= tb_catatan_status_ibu.id')
            ->where('tb_catatan_kelahiran.id', $id)
            ->get()->getRowArray();
    }

    public function list_per_user_kematian($id)
    {
        return $this->table('tb_catatan_status_ibu')
            ->join('tbl_kode_desa', 'tbl_kode_desa.kodeDesa = tb_catatan_status_ibu.kode_desa')
            ->join('tbl_kode_kecamatan', 'tbl_kode_kecamatan.kodeKecamatan = tb_catatan_status_ibu.kode_kecamatan')
            ->join('tb_dasa_wisma', 'tb_dasa_wisma.id= tb_catatan_status_ibu.kode_dasa_wisma')
            ->join('tbl_warga', 'tbl_warga.nomorIndukKependudukan = tb_catatan_status_ibu.nik_ibu')
            ->join('tb_catatan_kematian', 'tb_catatan_kematian.catatan_status_ibu_id= tb_catatan_status_ibu.id')
            ->where('tb_catatan_kematian.id', $id)
            ->get()->getRowArray();
    }

    public function list_kematian()
    {
        return $this->table('tb_catatan_status_ibu')
            ->join('tbl_kode_desa', 'tbl_kode_desa.kodeDesa = tb_catatan_status_ibu.kode_desa')
            ->join('tbl_kode_kecamatan', 'tbl_kode_kecamatan.kodeKecamatan = tb_catatan_status_ibu.kode_kecamatan')
            ->join('tb_dasa_wisma', 'tb_dasa_wisma.id= tb_catatan_status_ibu.kode_dasa_wisma')
            ->join('tbl_warga', 'tbl_warga.nomorIndukKependudukan = tb_catatan_status_ibu.nik_ibu')
            ->join('tb_catatan_kematian', 'tb_catatan_kematian.catatan_status_ibu_id= tb_catatan_status_ibu.id')
            ->orderBy('tb_catatan_status_ibu.id', 'DESC')
            ->get()->getResultArray();
    }


    public function list_catatan_status_ibu_kelompok_dasa_wisma($tgl_mulai, $tgl_akhir)
    {
        return $this->table('tb_catatan_status_ibu')
            ->join('tbl_kode_desa', 'tbl_kode_desa.kodeDesa = tb_catatan_status_ibu.kode_desa')
            ->join('tbl_kode_kecamatan', 'tbl_kode_kecamatan.kodeKecamatan = tb_catatan_status_ibu.kode_kecamatan')
            ->join('tb_dasa_wisma', 'tb_dasa_wisma.id= tb_catatan_status_ibu.kode_dasa_wisma')
            ->join('tbl_warga', 'tbl_warga.nomorIndukKependudukan = tb_catatan_status_ibu.nik_ibu', 'left')
            ->join('tb_catatan_kelahiran', 'tb_catatan_kelahiran.catatan_status_ibu_id= tb_catatan_status_ibu.id', 'left')
            ->join('tb_catatan_kematian', 'tb_catatan_kematian.catatan_status_ibu_id= tb_catatan_status_ibu.id', 'left')
            ->where("tb_catatan_status_ibu.tgl BETWEEN '$tgl_mulai' AND '$tgl_akhir'")
            ->orderBy('tb_catatan_status_ibu.id', 'DESC')
            ->get()->getResultArray();
    }

    public function list_catatan_status_ibu_tingkat_dusun($dusun, $tgl_mulai, $tgl_akhir)
    {
        return $this->table('tb_catatan_status_ibu')
            ->select("*,count(tbl_warga.rt) as jumlah_rt,count(tb_dasa_wisma.kode_dusun) as jumlah_dasa_wisma,count(if(tb_catatan_kelahiran.catatan_status_ibu ='HAMIL',1,null)) as jumlah_hamil,count(if(tb_catatan_kelahiran.catatan_status_ibu ='MELAHIRKAN',1,null)) as jumlah_melahirkan,count(if(tb_catatan_kelahiran.catatan_status_ibu ='NIFAS',1,null)) as jumlah_nifas,count(if(tb_catatan_kematian.catatan_status_ibu_meninggal ='MENINGGAL',1,null)) as jumlah_meninggal,count(if(tb_catatan_kelahiran.jenis_kelamin ='laki-laki',1,null)) as jumlah_bayi_laki_laki,count(if(tb_catatan_kelahiran.jenis_kelamin ='perempuan',1,null)) as jumlah_bayi_perempuan,count(tb_catatan_kelahiran.akte) as jumlah_akte,count(if(tb_catatan_kelahiran.akte ='tidak ada',1,null)) as jumlah_akte_tidak_ada,count(if(tb_catatan_kematian.jenis_kelamin_meninggal ='laki-laki',1,null)) as jumlah_bayi_meninggal_laki_laki,count(if(tb_catatan_kematian.jenis_kelamin_meninggal ='perempuan',1,null)) as jumlah_bayi_meninggal_perempuan")
            ->join('tbl_kode_desa', 'tbl_kode_desa.kodeDesa = tb_catatan_status_ibu.kode_desa')
            ->join('tbl_kode_kecamatan', 'tbl_kode_kecamatan.kodeKecamatan = tb_catatan_status_ibu.kode_kecamatan')
            ->join('tb_dasa_wisma', 'tb_dasa_wisma.id= tb_catatan_status_ibu.kode_dasa_wisma')
            ->join('tbl_warga', 'tbl_warga.nomorIndukKependudukan = tb_catatan_status_ibu.nik_ibu', 'left')
            ->join('tb_catatan_kelahiran', 'tb_catatan_kelahiran.catatan_status_ibu_id= tb_catatan_status_ibu.id', 'left')
            ->join('tb_catatan_kematian', 'tb_catatan_kematian.catatan_status_ibu_id= tb_catatan_status_ibu.id', 'left')
            ->where("tb_catatan_status_ibu.tgl BETWEEN '$tgl_mulai' AND '$tgl_akhir'")
            ->where('tbl_warga.dusun', $dusun)
            ->groupBy('tbl_warga.dusun')
            ->get()->getResultArray();
    }

    public function list_catatan_status_ibu_tingkat_desa($tgl_mulai, $tgl_akhir)
    {
        return $this->table('tb_catatan_status_ibu')
            ->select("*,count(tbl_warga.rt) as jumlah_rt,count(tb_dasa_wisma.kode_dusun) as jumlah_dasa_wisma,count(if(tb_catatan_kelahiran.catatan_status_ibu ='HAMIL',1,null)) as jumlah_hamil,count(if(tb_catatan_kelahiran.catatan_status_ibu ='MELAHIRKAN',1,null)) as jumlah_melahirkan,count(if(tb_catatan_kelahiran.catatan_status_ibu ='NIFAS',1,null)) as jumlah_nifas,count(if(tb_catatan_kematian.catatan_status_ibu_meninggal ='MENINGGAL',1,null)) as jumlah_meninggal,count(if(tb_catatan_kelahiran.jenis_kelamin ='laki-laki',1,null)) as jumlah_bayi_laki_laki,count(if(tb_catatan_kelahiran.jenis_kelamin ='perempuan',1,null)) as jumlah_bayi_perempuan,count(tb_catatan_kelahiran.akte) as jumlah_akte,count(if(tb_catatan_kelahiran.akte ='tidak ada',1,null)) as jumlah_akte_tidak_ada,count(if(tb_catatan_kematian.jenis_kelamin_meninggal ='laki-laki',1,null)) as jumlah_bayi_meninggal_laki_laki,count(if(tb_catatan_kematian.jenis_kelamin_meninggal ='perempuan',1,null)) as jumlah_bayi_meninggal_perempuan")
            ->join('tbl_kode_desa', 'tbl_kode_desa.kodeDesa = tb_catatan_status_ibu.kode_desa')
            ->join('tbl_kode_kecamatan', 'tbl_kode_kecamatan.kodeKecamatan = tb_catatan_status_ibu.kode_kecamatan')
            ->join('tb_dasa_wisma', 'tb_dasa_wisma.id= tb_catatan_status_ibu.kode_dasa_wisma')
            ->join('tbl_warga', 'tbl_warga.nomorIndukKependudukan = tb_catatan_status_ibu.nik_ibu', 'left')
            ->join('tb_catatan_kelahiran', 'tb_catatan_kelahiran.catatan_status_ibu_id= tb_catatan_status_ibu.id', 'left')
            ->join('tb_catatan_kematian', 'tb_catatan_kematian.catatan_status_ibu_id= tb_catatan_status_ibu.id', 'left')
            ->where("tb_catatan_status_ibu.tgl BETWEEN '$tgl_mulai' AND '$tgl_akhir'")
            ->orderBy('tb_catatan_status_ibu.id', 'DESC')
            ->groupBy('tbl_warga.dusun')
            ->get()->getResultArray();
    }

    // public function post_catatan_status_ibu($kode_nik, $kode_token, $kecamatan, $desa, $dasa_wisma, $tgl, $nik_ibu, $nama_suami, $status, $catatan_status_ibu, $nama_bayi, $jenis_kelamin, $tgl_lahir, $akte)
    // {
    //     $response = $this->curl->request('POST', 'http://localhost/ujungRambe/API/catatanStatusIbu', [
    //         'Content-Type' => 'application/json',
    //         'json' => [
    //             'nik' => $kode_nik,
    //             'token' => $kode_token,
    //             'kodeKecamatan' => $kecamatan,
    //             'kodeDesa' => $desa,
    //             'kodeDasaWisma' => $dasa_wisma,
    //             'tgl' => $tgl,
    //             'nikIbu' => $nik_ibu,
    //             'namaSuami' => $nama_suami,
    //             'status' => $status,
    //             'namaBayi' => $nama_bayi,
    //             'jenisKelamin' => $jenis_kelamin,
    //             'tglLahir' => $tgl_lahir,
    //             'akte' =>  $akte,
    //             'tglMeninggal' => '494',
    //             'sebabMeninggal' => '494',
    //             'keterangan' => '494'
    //         ]
    //     ]);

    //     $result = json_decode($response->getBody(), TRUE);
    //     return $result;
    // }
}
