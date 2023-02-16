<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_pendapatan;
 
class Model_pelaksanaan extends Model
{
    protected $table                = 'tbl_pelaksanaan';
    protected $primaryKey           = 'idPelaksanaan';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['jenisPelaksanaan','jumlah','statusPelaksanaan','tahun'];
    
    
    public function getPelaksanaan()
    {
        return $this->findAll();
    }
 
}