<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_jenisKelamin;
 
class Model_jenisKelamin extends Model
{
    protected $table                = 'tbl_jenis_kelamin';
    protected $primaryKey           = 'idJenisKelamin';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['jenisKelamin','jumlah'];
    
    
    public function getJenisKelamin()
    {
        return $this->findAll();
    }
 
}