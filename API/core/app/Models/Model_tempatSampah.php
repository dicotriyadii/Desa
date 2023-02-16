<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_tempatSampah;
 
class Model_tempatSampah extends Model
{
    protected $table                = 'tb_tempat_sampah';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['jenis_tempat_sampah'];
    
    
    public function getTempatSampah()
    {
        return $this->findAll();
    }
 
}