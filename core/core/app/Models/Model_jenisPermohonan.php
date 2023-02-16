<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_jenisPermohonan;
 
class Model_jenisPermohonan extends Model
{
    protected $table                = 'tbl_jenispermohonan';
    protected $primaryKey           = 'idPermohonan';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['jenisPermohonan'];
    
    
    public function getJenisPermohonan()
    {
        return $this->findAll();
    }
 
}