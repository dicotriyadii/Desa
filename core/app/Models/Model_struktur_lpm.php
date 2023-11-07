<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_struktur_lpm;
 
class Model_struktur_lpm extends Model
{
    protected $table                = 'tbl_struktur_lpm';
    protected $primaryKey           = 'idAnggotaLPM';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeKecamatan','kodeDesa','nik','jabatan','gambar'];
}