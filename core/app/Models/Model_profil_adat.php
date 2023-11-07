<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_profil_adat;
 
class Model_profil_adat extends Model
{
    protected $table                = 'tbl_profil_desa_adat';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeKecamatan','kodeDesa','jenisLembagaAdat','status'];
}