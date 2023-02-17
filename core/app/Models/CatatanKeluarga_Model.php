<?php

namespace App\Models;

use CodeIgniter\Model;

class CatatanKeluarga_Model extends Model
{
    protected $table      = 'tb_catatan_keluarga';
    protected $primaryKey = 'idCatatanKeluarga';
    protected $allowedFields = ['kode_kecamatan', 'kode_desa', 'kode_dasa_wisma', 'nik', 'jumlah_kk', 'jml_laki_laki', 'jml_perempuan', 'balita_laki_laki', 'balita_perempuan', 'pus', 'wus', 'ibu_hamil', 'ibu_menyusui', 'lansia', '3_buta', 'jml_jamban_keluarga', 'berkebutuhan_khusus', 'kriteria_rumah', 'sumber_air', 'tempat_sampah', 'jenis_kegiatan_id', 'nama_kegiatan', 'makanan_pokok', 'keterangan', 'tgl'];

    protected $curl;

    public function __construct()
    {
        $this->curl =  \Config\Services::curlrequest();
    }

    public function list()
    {
        return $this->table('tb_catatan_keluarga')
            ->join('tbl_kode_desa', 'tbl_kode_desa.kodeDesa = tb_catatan_keluarga.kode_desa')
            ->join('tbl_kode_kecamatan', 'tbl_kode_kecamatan.kodeKecamatan = tb_catatan_keluarga.kode_kecamatan')
            ->join('tb_dasa_wisma', 'tb_dasa_wisma.id= tb_catatan_keluarga.kode_dasa_wisma')
            ->join('tbl_warga', 'tbl_warga.nomorIndukKependudukan = tb_catatan_keluarga.nik')
            ->join('tb_kriteria_rumah', 'tb_kriteria_rumah.id = tb_catatan_keluarga.kriteria_rumah')
            ->join('tb_sumber_air_keluarga', 'tb_sumber_air_keluarga.id = tb_catatan_keluarga.sumber_air')
            ->join('tb_tempat_sampah', 'tb_tempat_sampah.id = tb_catatan_keluarga.tempat_sampah')
            ->join('tb_kegiatan_pkk_yg_diikuti', 'tb_kegiatan_pkk_yg_diikuti.id = tb_catatan_keluarga.jenis_kegiatan_id')
            ->join('tb_makanan_pokok', 'tb_makanan_pokok.id = tb_catatan_keluarga.makanan_pokok')
            ->orderBy('tb_catatan_keluarga.idCatatanKeluarga', 'DESC')
            ->get()->getResultArray();
    }

    public function list_per_warga($nik)
    {
        return $this->table('tb_catatan_keluarga')
            ->join('tbl_kode_desa', 'tbl_kode_desa.kodeDesa = tb_catatan_keluarga.kode_desa')
            ->join('tbl_kode_kecamatan', 'tbl_kode_kecamatan.kodeKecamatan = tb_catatan_keluarga.kode_kecamatan')
            ->join('tb_dasa_wisma', 'tb_dasa_wisma.id= tb_catatan_keluarga.kode_dasa_wisma')
            ->join('tbl_warga', 'tbl_warga.nomorIndukKependudukan = tb_catatan_keluarga.nik')
            ->join('tb_kriteria_rumah', 'tb_kriteria_rumah.id = tb_catatan_keluarga.kriteria_rumah')
            ->join('tb_sumber_air_keluarga', 'tb_sumber_air_keluarga.id = tb_catatan_keluarga.sumber_air')
            ->join('tb_tempat_sampah', 'tb_tempat_sampah.id = tb_catatan_keluarga.tempat_sampah')
            ->join('tb_kegiatan_pkk_yg_diikuti', 'tb_kegiatan_pkk_yg_diikuti.id = tb_catatan_keluarga.jenis_kegiatan_id')
            ->join('tb_makanan_pokok', 'tb_makanan_pokok.id = tb_catatan_keluarga.makanan_pokok')
            ->orderBy('tb_catatan_keluarga.idCatatanKeluarga', 'DESC')
            ->where('nik', $nik)
            ->get()->getRowArray();
    }

    public function list_catatan_keluarga($tgl_mulai, $tgl_akhir)
    {
        return $this->table('tb_catatan_keluarga')
            ->join('tbl_kode_desa', 'tbl_kode_desa.kodeDesa = tb_catatan_keluarga.kode_desa')
            ->join('tbl_kode_kecamatan', 'tbl_kode_kecamatan.kodeKecamatan = tb_catatan_keluarga.kode_kecamatan')
            ->join('tb_dasa_wisma', 'tb_dasa_wisma.id= tb_catatan_keluarga.kode_dasa_wisma')
            ->join('tbl_warga', 'tbl_warga.nomorIndukKependudukan = tb_catatan_keluarga.nik', 'left')
            ->join('tb_kriteria_rumah', 'tb_kriteria_rumah.id = tb_catatan_keluarga.kriteria_rumah', 'left')
            ->join('tb_sumber_air_keluarga', 'tb_sumber_air_keluarga.id = tb_catatan_keluarga.sumber_air', 'left')
            ->join('tb_tempat_sampah', 'tb_tempat_sampah.id = tb_catatan_keluarga.tempat_sampah', 'left')
            ->join('tb_kegiatan_pkk_yg_diikuti', 'tb_kegiatan_pkk_yg_diikuti.id = tb_catatan_keluarga.jenis_kegiatan_id', 'left')
            ->join('tb_makanan_pokok', 'tb_makanan_pokok.id = tb_catatan_keluarga.makanan_pokok', 'left')
            ->where("tb_catatan_keluarga.tgl BETWEEN '$tgl_mulai' AND '$tgl_akhir'")
            // ->orderBy('id', 'DESC')
            ->get()->getResultArray();
    }

    public function list_catatan_keluarga_kelompok_dasa_wisma($tgl_mulai, $tgl_akhir)
    {
        return $this->table('tb_catatan_keluarga')
            ->join('tbl_kode_desa', 'tbl_kode_desa.kodeDesa = tb_catatan_keluarga.kode_desa')
            ->join('tbl_kode_kecamatan', 'tbl_kode_kecamatan.kodeKecamatan = tb_catatan_keluarga.kode_kecamatan')
            ->join('tb_dasa_wisma', 'tb_dasa_wisma.id= tb_catatan_keluarga.kode_dasa_wisma')
            ->join('tbl_warga', 'tbl_warga.nomorIndukKependudukan = tb_catatan_keluarga.nik', 'left')
            ->join('tb_kriteria_rumah', 'tb_kriteria_rumah.id = tb_catatan_keluarga.kriteria_rumah', 'left')
            ->join('tb_sumber_air_keluarga', 'tb_sumber_air_keluarga.id = tb_catatan_keluarga.sumber_air', 'left')
            ->join('tb_tempat_sampah', 'tb_tempat_sampah.id = tb_catatan_keluarga.tempat_sampah', 'left')
            ->join('tb_kegiatan_pkk_yg_diikuti', 'tb_kegiatan_pkk_yg_diikuti.id = tb_catatan_keluarga.jenis_kegiatan_id', 'left')
            ->join('tb_makanan_pokok', 'tb_makanan_pokok.id = tb_catatan_keluarga.makanan_pokok', 'left')
            ->where("tb_catatan_keluarga.tgl BETWEEN '$tgl_mulai' AND '$tgl_akhir'")
            ->groupBy('tbl_warga.nomorKartuKeluarga')
            ->get()->getResultArray();
    }

    public function list_catatan_keluarga_tp_pkk_desa($tgl_mulai, $tgl_akhir)
    {
        return $this->table('tb_catatan_keluarga')
            ->join('tbl_kode_desa', 'tbl_kode_desa.kodeDesa = tb_catatan_keluarga.kode_desa')
            ->join('tbl_kode_kecamatan', 'tbl_kode_kecamatan.kodeKecamatan = tb_catatan_keluarga.kode_kecamatan')
            ->join('tb_dasa_wisma', 'tb_dasa_wisma.id= tb_catatan_keluarga.kode_dasa_wisma')
            ->join('tbl_warga', 'tbl_warga.nomorIndukKependudukan = tb_catatan_keluarga.nik', 'left')
            ->join('tb_kriteria_rumah', 'tb_kriteria_rumah.id = tb_catatan_keluarga.kriteria_rumah', 'left')
            ->join('tb_sumber_air_keluarga', 'tb_sumber_air_keluarga.id = tb_catatan_keluarga.sumber_air', 'left')
            ->join('tb_tempat_sampah', 'tb_tempat_sampah.id = tb_catatan_keluarga.tempat_sampah', 'left')
            ->join('tb_kegiatan_pkk_yg_diikuti', 'tb_kegiatan_pkk_yg_diikuti.id = tb_catatan_keluarga.jenis_kegiatan_id', 'left')
            ->join('tb_makanan_pokok', 'tb_makanan_pokok.id = tb_catatan_keluarga.makanan_pokok', 'left')
            ->where("tb_catatan_keluarga.tgl BETWEEN '$tgl_mulai' AND '$tgl_akhir'")
            ->groupBy('tbl_warga.dusun')
            ->get()->getResultArray();
    }

    // public function post_catatan_keluarga($kode_nik, $kode_token, $kecamatan, $desa, $dasa_wisma, $tgl, $nik, $berkebutuhan_khusus, $kriteria_rumah, $sumber_air, $tempat_sampah, $jenis_kegiatan_id, $nama_kegiatan, $makanan_pokok, $keterangan)
    // {
    //     $response = $this->curl->request('POST', 'http://localhost/ujungRambe/API/catatanKeluarga', [
    //         'Content-Type' => 'application/json',
    //         'json' => [
    //             'nik' => $kode_nik,
    //             'token' => $kode_token,
    //             'kodeKecamatan' => $kecamatan,
    //             'kodeDesa' => $desa,
    //             'kodeDasaWisma' => $dasa_wisma,
    //             'nik' => $nik,
    //             'berkebutuhanKhusus' => $berkebutuhan_khusus,
    //             'kriteriaRumahId' => $kriteria_rumah,
    //             'sumberAirId' =>  $sumber_air,
    //             'tempatSampahId' => $tempat_sampah,
    //             'jenisKegiatanId' => $jenis_kegiatan_id,
    //             'namaKegiatan' => $nama_kegiatan,
    //             'makananPokokId' => $makanan_pokok,
    //             'keterangan' => $keterangan,
    //             'tgl' => $tgl
    //         ]
    //     ]);

    //     $result = json_decode($response->getBody(), TRUE);
    //     return $result;
    // }
}
