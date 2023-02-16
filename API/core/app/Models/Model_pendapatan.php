<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_pendapatan;
 
class Model_pendapatan extends Model
{
    protected $table                = 'tbl_pendapatan';
    protected $primaryKey           = 'idPendapatan';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['jenisPendapatan','jumlah','statusPendapatan','tahun'];
    
    
    public function getPendapatan()
    {
        return $this->findAll();
    }
 
}