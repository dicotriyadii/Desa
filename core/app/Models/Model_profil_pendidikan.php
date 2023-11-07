<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_profil_pendidikan;
 
class Model_profil_pendidikan extends Model
{
    protected $table                = 'tbl_profil_desa_pendidikan';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeKecamatan','kodeDesa','jenisGedung','sewa','milikSendiri'];
}