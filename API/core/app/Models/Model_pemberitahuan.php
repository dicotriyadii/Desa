<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_pemberitahuan;
 
class Model_pemberitahuan extends Model
{
    protected $table                = 'tbl_pemberitahuan';
    protected $primaryKey           = 'idPemberitahuan';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['pemberitahuan'];
    
    
    public function getPemberitahuan()
    {
        return $this->findAll();
    }
 
}