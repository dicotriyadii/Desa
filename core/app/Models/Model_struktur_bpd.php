<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_struktur_bpd;
 
class Model_struktur_bpd extends Model
{
    protected $table                = 'tbl_struktur_bpd';
    protected $primaryKey           = 'idAnggotaBpd';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['nik','jabatan','gambar'];
}