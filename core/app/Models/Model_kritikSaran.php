<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_kritikSaran;
 
class Model_kritikSaran extends Model
{
    protected $table                = 'tbl_kritik_saran';
    protected $primaryKey           = 'idKritikSaran';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeKecamatan','kodeDesa','nama','email','kritik','saran','tanggal'];
}