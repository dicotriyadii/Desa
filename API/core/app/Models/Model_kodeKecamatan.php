<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_kodeKecamatan;
 
class Model_kodeKecamatan extends Model
{
    protected $table                = 'tbl_kode_Kecamatan';
    protected $primaryKey           = 'idKecamatan';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeKecamatan','namaKecamatan'];
    
    public function getKodeKecamatan()
    {
        return $this->findAll();
    }
 
}