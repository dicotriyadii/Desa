<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_profil_irigasi;
 
class Model_profil_irigasi extends Model
{
    protected $table                = 'tbl_profil_desa_irigasi';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeKecamatan','kodeDesa','jenisIrigasi','jumlah'];
}