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

    public function list_catatan_keluarga_tingkat_dusun($tgl_mulai, $tgl_akhir)
    {
        return $this->table('tb_catatan_keluarga')->select("*,count(tb_dasa_wisma.kode_dusun) as jumlah_dasa_wisma,count(tbl_warga.nomorKartuKeluarga) as jumlah_krt,sum(tb_catatan_keluarga.jumlah_kk) as jumlah_kk,sum(tb_catatan_keluarga.jml_laki_laki) as jumlah_laki_laki,sum(tb_catatan_keluarga.jml_perempuan) as jumlah_perempuan,sum(tb_catatan_keluarga.balita_laki_laki) as jumlah_balita_laki_laki,sum(tb_catatan_keluarga.balita_perempuan) as jumlah_balita_perempuan,sum(tb_catatan_keluarga.pus) as jumlah_pus,sum(tb_catatan_keluarga.wus) as jumlah_wus,sum(tb_catatan_keluarga.ibu_hamil) as jumlah_ibu_hamil,sum(tb_catatan_keluarga.ibu_menyusui) as jumlah_ibu_menyusui,sum(tb_catatan_keluarga.lansia) as jumlah_lansia,sum(tb_catatan_keluarga.3_buta) as jumlah_3_buta,sum(tb_catatan_keluarga.jml_jamban_keluarga) as jumlah_jamban_keluarga,count(tb_catatan_keluarga.berkebutuhan_khusus) as jumlah_berkebutuhan_khusus,count(if(tb_catatan_keluarga.kriteria_rumah=2 or tb_catatan_keluarga.kriteria_rumah=4 or tb_catatan_keluarga.kriteria_rumah=5,1,null)) as jumlah_kriteria_rumah_sehat,count(if(tb_catatan_keluarga.kriteria_rumah=3 or tb_catatan_keluarga.kriteria_rumah=6,1,null)) as jumlah_kriteria_rumah_kurang_sehat,count(if(tb_catatan_keluarga.tempat_sampah=2,1,null)) as jumlah_tempat_sampah,count(if(tb_catatan_keluarga.kriteria_rumah=2 or tb_catatan_keluarga.kriteria_rumah=3 or tb_catatan_keluarga.kriteria_rumah=6,1,null)) as jumlah_kriteria_memiliki_spal,sum(tb_catatan_keluarga.jml_jamban_keluarga) as jumlah_jamban,count(if(tb_catatan_keluarga.kriteria_rumah=2 or tb_catatan_keluarga.kriteria_rumah=3 or tb_catatan_keluarga.kriteria_rumah=4,1,null)) as jumlah_menempel_stiker,count(if(tb_catatan_keluarga.sumber_air=2,1,null)) as jumlah_pdam,count(if(tb_catatan_keluarga.sumber_air=3,1,null)) as jumlah_sumur,count(if(tb_catatan_keluarga.sumber_air=4,1,null)) as jumlah_lainnya,count(if(tb_catatan_keluarga.makanan_pokok=4,1,null)) as jumlah_beras,count(if(tb_catatan_keluarga.makanan_pokok=5,1,null)) as jumlah_non_beras,count(if(tb_catatan_keluarga.jenis_kegiatan_id=2,1,null)) as jumlah_up2k,count(if(tb_catatan_keluarga.jenis_kegiatan_id=3,1,null)) as jumlah_pemanfaatan_tanah_perkarangan,count(if(tb_catatan_keluarga.jenis_kegiatan_id=4,1,null)) as jumlah_industri_rumah_tangga,count(if(tb_catatan_keluarga.jenis_kegiatan_id=5,1,null)) as jumlah_kesehatan_lingkungan")
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
            ->where('tbl_warga.dusun', 'Dusun X')
            // ->groupBy('tbl_warga.dusun')
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
        return $this->table('tb_catatan_keluarga')->select("*,count(tb_dasa_wisma.kode_dusun) as jumlah_dasa_wisma,count(tbl_warga.nomorKartuKeluarga) as jumlah_krt,sum(tb_catatan_keluarga.jumlah_kk) as jumlah_kk,sum(tb_catatan_keluarga.jml_laki_laki) as jumlah_laki_laki,sum(tb_catatan_keluarga.jml_perempuan) as jumlah_perempuan,sum(tb_catatan_keluarga.balita_laki_laki) as jumlah_balita_laki_laki,sum(tb_catatan_keluarga.balita_perempuan) as jumlah_balita_perempuan,sum(tb_catatan_keluarga.pus) as jumlah_pus,sum(tb_catatan_keluarga.wus) as jumlah_wus,sum(tb_catatan_keluarga.ibu_hamil) as jumlah_ibu_hamil,sum(tb_catatan_keluarga.ibu_menyusui) as jumlah_ibu_menyusui,sum(tb_catatan_keluarga.lansia) as jumlah_lansia,sum(tb_catatan_keluarga.3_buta) as jumlah_3_buta,sum(tb_catatan_keluarga.jml_jamban_keluarga) as jumlah_jamban_keluarga,count(tb_catatan_keluarga.berkebutuhan_khusus) as jumlah_berkebutuhan_khusus,count(if(tb_catatan_keluarga.kriteria_rumah=2 or tb_catatan_keluarga.kriteria_rumah=4 or tb_catatan_keluarga.kriteria_rumah=5,1,null)) as jumlah_kriteria_rumah_sehat,count(if(tb_catatan_keluarga.kriteria_rumah=3 or tb_catatan_keluarga.kriteria_rumah=6,1,null)) as jumlah_kriteria_rumah_kurang_sehat,count(if(tb_catatan_keluarga.tempat_sampah=2,1,null)) as jumlah_tempat_sampah,count(if(tb_catatan_keluarga.kriteria_rumah=2 or tb_catatan_keluarga.kriteria_rumah=3 or tb_catatan_keluarga.kriteria_rumah=6,1,null)) as jumlah_kriteria_memiliki_spal,sum(tb_catatan_keluarga.jml_jamban_keluarga) as jumlah_jamban,count(if(tb_catatan_keluarga.kriteria_rumah=2 or tb_catatan_keluarga.kriteria_rumah=3 or tb_catatan_keluarga.kriteria_rumah=4,1,null)) as jumlah_menempel_stiker,count(if(tb_catatan_keluarga.sumber_air=2,1,null)) as jumlah_pdam,count(if(tb_catatan_keluarga.sumber_air=3,1,null)) as jumlah_sumur,count(if(tb_catatan_keluarga.sumber_air=4,1,null)) as jumlah_lainnya,count(if(tb_catatan_keluarga.makanan_pokok=4,1,null)) as jumlah_beras,count(if(tb_catatan_keluarga.makanan_pokok=5,1,null)) as jumlah_non_beras,count(if(tb_catatan_keluarga.jenis_kegiatan_id=2,1,null)) as jumlah_up2k,count(if(tb_catatan_keluarga.jenis_kegiatan_id=3,1,null)) as jumlah_pemanfaatan_tanah_perkarangan,count(if(tb_catatan_keluarga.jenis_kegiatan_id=4,1,null)) as jumlah_industri_rumah_tangga,count(if(tb_catatan_keluarga.jenis_kegiatan_id=5,1,null)) as jumlah_kesehatan_lingkungan")
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
