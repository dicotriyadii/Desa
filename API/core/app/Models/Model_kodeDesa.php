<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_kodeDesa;
 
class Model_kodeDesa extends Model
{
    protected $table                = 'tbl_kode_desa';
    protected $primaryKey           = 'idDesa';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeDesa','namaDesa'];
    
    public function getKodeDesa()
    {
        return $this->findAll();
    }
 
}