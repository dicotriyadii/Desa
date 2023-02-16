<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_kriteriaRumah;
 
class Model_kriteriaRumah extends Model
{
    protected $table                = 'tb_kriteria_rumah';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['jenis_kriteria_rumah'];
    
    
    public function getKriteriaRumah()
    {
        return $this->findAll();
    }
 
}