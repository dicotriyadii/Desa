<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_profil_rawanBencana;
 
class Model_profil_rawanBencana extends Model
{
    protected $table                = 'tbl_profil_desa_rawanbencana';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeKecamatan','kodeDesa','jenisBencana','jumlah'];
}