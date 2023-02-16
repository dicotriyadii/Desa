<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_sejarah_desa;
 
class Model_sejarah_desa extends Model
{
    protected $table                = 'tbl_sejarah_desa';
    protected $primaryKey           = 'idSejarahDesa';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['keteranganSejarahDesa'];
    
    
    public function getSejarahDesa()
    {
        return $this->findAll();
    }
 
}