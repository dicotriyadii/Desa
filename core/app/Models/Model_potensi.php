<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_potensi;
 
class Model_potensi extends Model
{
    protected $table                = 'tbl_potensi';
    protected $primaryKey           = 'idPotensi';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeKecamatan','kodeDesa','jenisPotensi','namaPotensi','alamatPotensi','helpdesk','gambar'];
}