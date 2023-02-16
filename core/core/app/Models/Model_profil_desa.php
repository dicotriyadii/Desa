<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_profil_desa;
 
class Model_profil_desa extends Model
{
    protected $table                = 'tbl_profil_desa';
    protected $primaryKey           = 'idProfilDesa';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['keteranganDesa'];
    
    
    public function getProfilDesa()
    {
        return $this->findAll();
    }
 
}