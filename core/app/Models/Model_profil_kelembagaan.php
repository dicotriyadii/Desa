<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_profil_kelembagaan;
 
class Model_profil_kelembagaan extends Model
{
    protected $table                = 'tbl_profil_desa_kelembagaan';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeKecamatan','kodeDesa','jenisLembaga','jumlah','pengurus','jenisKegiatan'];
}