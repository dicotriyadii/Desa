<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_pendidikanDitempuh;
 
class Model_pendidikanDitempuh extends Model
{
    protected $table                = 'tbl_pendidikan_ditempuh';
    protected $primaryKey           = 'idPendidikanDitempuh';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['jenisPendidikan','jumlah'];
    
    
    public function getPendidikanDitempuh()
    {
        return $this->findAll();
    }
 
}