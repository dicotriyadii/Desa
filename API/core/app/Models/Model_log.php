<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_log;
 
class Model_log extends Model
{
    protected $table                = 'tbl_log';
    protected $primaryKey           = 'idLog';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['nama','waktu','keterangan','hakAkses'];
    
    
    public function getLog()
    {
        return $this->findAll();
    }
 
}