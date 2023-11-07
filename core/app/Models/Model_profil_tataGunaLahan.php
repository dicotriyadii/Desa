<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_profil_tataGunaLahan;
 
class Model_profil_tataGunaLahan extends Model
{
    protected $table                = 'tbl_profil_desa_tatagunalahan';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeKecamatan','kodeDesa','jenisLahan','jumlah'];
}