<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_profil_peribadatan;
 
class Model_profil_peribadatan extends Model
{
    protected $table                = 'tbl_profil_desa_peribadatan';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeKecamatan','kodeDesa','jenisTempatIbadah','jumlah'];
}