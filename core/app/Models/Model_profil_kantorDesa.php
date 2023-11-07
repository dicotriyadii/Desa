<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_profil_kantorDesa;
 
class Model_profil_kantorDesa extends Model
{
    protected $table                = 'tbl_profil_desa_kantordesa';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeKecamatan','kodeDesa','jenisSarana','status'];
}