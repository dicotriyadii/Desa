<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_profil_keamanan;
 
class Model_profil_keamanan extends Model
{
    protected $table                = 'tbl_profil_desa_keamanan';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeKecamatan','kodeDesa','keamanan','jumlah'];
}