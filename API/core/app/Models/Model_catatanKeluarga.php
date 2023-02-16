<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_catatanKeluarga;
 
class Model_catatanKeluarga extends Model
{
    protected $table                = 'tb_catatan_keluarga';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kode_kecamatan','kode_desa','kode_dasa_wisma','nik','berkebutuhan_khusus','kriteria_rumah','sumber_air','tempat_sampah','jenis_kegiatan_id','nama_kegiatan','makanan_pokok','keterangan','tgl'];
}