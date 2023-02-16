<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_umur;
 
class Model_umur extends Model
{
    protected $table                = 'tbl_umur';
    protected $primaryKey           = 'idUmur';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['umur','jumlah'];
    
    
    public function getUmur()
    {
        return $this->findAll();
    }
 
}