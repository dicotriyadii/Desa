<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_profil_orbitasi;
 
class Model_profil_orbitasi extends Model
{
    protected $table                = 'tbl_profil_desa_orbitasi';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeKecamatan','kodeDesa','jenisSarana','status'];
}