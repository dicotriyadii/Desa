<?php namespace App\Models;
 
use CodeIgniter\Model;
class Model_data extends Model
{   
    // Tampil Keselurahan
    public function getWargaAll()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_warga');
        $builder->select('*');
        return $builder->get()->getResultArray();
    }
    public function getStrukturPKKAll()
    {
    	$db      = \Config\Database::connect();
		$builder = $db->table('tbl_struktur_pkk');
		$builder->select('*');
		$builder->join('tbl_warga', 'tbl_warga.nomorIndukKependudukan = tbl_struktur_pkk.nik');
		return $builder->get()->getResultArray();
    }

    public function getStrukturPemdesAll()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_struktur_pemerintah_desa');
        $builder->select('*');
        $builder->join('tbl_warga', 'tbl_warga.nomorIndukKependudukan = tbl_struktur_pemerintah_desa.nik');
        return $builder->get()->getResultArray();
    }
    public function getCatatanKeluargaAll()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tb_catatan_keluarga');
        $builder->select('*');
        $builder->join('tbl_warga', 'tbl_warga.nomorIndukKependudukan = tb_catatan_keluarga.nik');
        $builder->join('tb_kriteria_rumah', 'tb_kriteria_rumah.id = tb_catatan_keluarga.kriteria_rumah');
        $builder->join('tb_sumber_air_keluarga', 'tb_sumber_air_keluarga.id = tb_catatan_keluarga.sumber_air');
        $builder->join('tb_tempat_sampah', 'tb_tempat_sampah.id = tb_catatan_keluarga.tempat_sampah');
        $builder->join('tb_kegiatan_pkk_yg_diikuti', 'tb_kegiatan_pkk_yg_diikuti.id = tb_catatan_keluarga.jenis_kegiatan_id');
        $builder->join('tb_makanan_pokok', 'tb_makanan_pokok.id = tb_catatan_keluarga.makanan_pokok');
        return $builder->get()->getResultArray();
    }
    public function getStatusIbuBayiMeninggal()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tb_catatan_status_ibu');
        $builder->select('*');
        $builder->join('tbl_warga', 'tbl_warga.nomorIndukKependudukan = tb_catatan_status_ibu.nik_ibu');
        $builder->join('tb_catatan_kematian', 'tb_catatan_kematian.catatan_status_ibu_id = tb_catatan_status_ibu.id');
        return $builder->get()->getResultArray();
    }
    public function getStatusIbuBayiLahir()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tb_catatan_status_ibu');
        $builder->select('*');
        $builder->join('tbl_warga', 'tbl_warga.nomorIndukKependudukan = tb_catatan_status_ibu.nik_ibu');
        $builder->join('tb_catatan_kelahiran', 'tb_catatan_kelahiran.catatan_status_ibu_id = tb_catatan_status_ibu.id');
        return $builder->get()->getResultArray();
    }
    public function getTempatSampahAll()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tb_tempat_sampah');
        $builder->select('*');
        return $builder->get()->getResultArray();
    }
    public function getMakananPokokAll()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tb_makanan_pokok');
        $builder->select('*');
        return $builder->get()->getResultArray();
    }
    public function getSumberAirKeluargaAll()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tb_sumber_air_keluarga');
        $builder->select('*');
        return $builder->get()->getResultArray();
    }
    public function getKriteriaRumahAll()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tb_kriteria_rumah');
        $builder->select('*');
        return $builder->get()->getResultArray();
    }
    public function getKegiatanPKKDiikutiAll()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tb_kegiatan_pkk_yg_diikuti');
        $builder->select('*');
        return $builder->get()->getResultArray();
    }
    public function getDasaWismaAll()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tb_dasa_wisma');
        $builder->select('*');
        return $builder->get()->getResultArray();
    }

    // Tampil Detail
    public function getWargaDetail($id=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_Warga');
        $builder->select('*');
        $builder->where('nomorIndukKependudukan',$id);
        return $builder->get()->getResultArray();
    }
    public function getStrukturPKKDetail($id=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_struktur_pkk');
        $builder->select('*');
        $builder->where('nik',$id);
        $builder->join('tbl_warga', 'tbl_warga.nomorIndukKependudukan = tbl_struktur_pkk.nik');
        return $builder->get()->getResultArray();
    }

    public function getStrukturPemdesDetail($id=null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tbl_struktur_pemerintah_desa');
        $builder->select('*');
        $builder->where('nik',$id);
        $builder->join('tbl_warga', 'tbl_warga.nomorIndukKependudukan = tbl_struktur_pemerintah_desa.nik');
        return $builder->get()->getResultArray();
    }

}