<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_makananPokok;
 
class Model_makananPokok extends Model
{
    protected $table                = 'tb_makanan_pokok';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['makanan_pokok'];
    
    
    public function getMakananPokok()
    {
        return $this->findAll();
    }
 
}