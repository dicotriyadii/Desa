<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_dasawisma;
 
class Model_dasawisma extends Model
{
    protected $table                = 'tb_dasa_wisma';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kode_kecamatan','kode_desa','kode_dusun','RT','RW','nama_dasa_wisma'];
}