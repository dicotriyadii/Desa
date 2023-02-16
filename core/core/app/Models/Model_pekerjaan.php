<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_pekerjaan;
 
class Model_pekerjaan extends Model
{
    protected $table                = 'tbl_pekerjaan';
    protected $primaryKey           = 'idPekerjaan';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['namaPekerjaan','jumlah'];
    
    
    public function getPekerjaan()
    {
        return $this->findAll();
    }
 
}