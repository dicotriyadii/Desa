<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_informasi_regulasi;
 
class Model_informasi_regulasi extends Model
{
    protected $table                = 'tbl_informasi_regulasi';
    protected $primaryKey           = 'idRegulasi';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeDesa','kodeKecamatan','judulRegulasi','berkas'];
}