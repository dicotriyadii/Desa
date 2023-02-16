<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_desa;
 
class Model_desa extends Model
{
    protected $table                = 'tbl_desa';
    protected $primaryKey           = 'idDesa';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['namaDesa','namaKecamatan','alamatDesa','linkPetaDesa','kodeKecamatan','kodeDesa'];
    
    
    public function getDesa()
    {
        return $this->findAll();
    }
 
}