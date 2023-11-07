<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_profil_produksi;
 
class Model_profil_produksi extends Model
{
    protected $table                = 'tbl_profil_desa_produksi';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeKecamatan','kodeDesa','jenisProduksi','namaProduksi'];
}