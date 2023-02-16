<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_pendidikanTerakhir;
 
class Model_pendidikanTerakhir extends Model
{
    protected $table                = 'tbl_pendidikan_terakhir';
    protected $primaryKey           = 'idPendidikanTerakhir';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['jenisPendidikan','jumlah'];
    
    
    public function getPendidikanTerakhir()
    {
        return $this->findAll();
    }
 
}