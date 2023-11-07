<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_profil_airBersih;
 
class Model_profil_airBersih extends Model
{
    protected $table                = 'tbl_profil_desa_airbersih';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeKecamatan','kodeDesa','jenisAirbBersih','jumlah'];
}