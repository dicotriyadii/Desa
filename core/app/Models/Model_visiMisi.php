<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_visiMisi;
 
class Model_visiMisi extends Model
{
    protected $table                = 'tbl_visimisi';
    protected $primaryKey           = 'idVisiMisi';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['visi','misi','keterangan'];
    
    
    public function getVisiMisi()
    {
        return $this->findAll();
    }
 
}