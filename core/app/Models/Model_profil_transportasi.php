<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_profil_transportasi;
 
class Model_profil_transportasi extends Model
{
    protected $table                = 'tbl_profil_desa_transportasi';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeKecamatan','kodeDesa','jenisSarana','kondisiBaik','kondisiRusak'];
}