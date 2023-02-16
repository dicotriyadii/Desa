<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_jenisSurat;
 
class Model_jenisSurat extends Model
{
    protected $table                = 'tbl_jenissurat';
    protected $primaryKey           = 'idJenisSurat';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['jenisSurat'];
    
    public function getJenisSurat()
    {
        return $this->findAll();
    }
 
}