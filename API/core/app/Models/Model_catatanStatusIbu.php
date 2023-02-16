<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_catatanStatusIbu;
 
class Model_catatanStatusIbu extends Model
{
    protected $table                = 'tb_catatan_status_ibu';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kode_kecamatan','kode_desa','kode_dasa_wisma','tgl','nik_ibu','nama_ibu','nama_suami','status'];
 
}