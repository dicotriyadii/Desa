<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_kodeDusun;
 
class Model_kodeDusun extends Model
{
    protected $table                = 'tbl_dusun';
    protected $primaryKey           = 'idDusun';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['namaDusun','laki','perempuan','jumlah'];
    
    public function getKodeDusun()
    {
        return $this->findAll();
    }
 
}