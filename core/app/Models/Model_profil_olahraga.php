<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_profil_olahraga;
 
class Model_profil_olahraga extends Model
{
    protected $table                = 'tbl_profil_desa_olahraga';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeKecamatan','kodeDesa','jenisLapangan','jumlah'];
}