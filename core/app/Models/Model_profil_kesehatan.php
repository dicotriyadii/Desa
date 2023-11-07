<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_profil_kesehatan;
 
class Model_profil_kesehatan extends Model
{
    protected $table                = 'tbl_profil_desa_kesehatan';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeKecamatan','kodeDesa','jenisPrasarana','jumlah'];
}