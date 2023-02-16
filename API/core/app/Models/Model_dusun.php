<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_dusun;
 
class Model_dusun extends Model
{
    protected $table                = 'tbl_dusun';
    protected $primaryKey           = 'idDusun';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['namaDusun','laki','perempuan','jumlah'];
    
    
    public function getDusun()
    {
        return $this->findAll();
    }
 
}