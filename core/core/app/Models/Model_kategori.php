<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_kategori;
 
class Model_kategori extends Model
{
    protected $table                = 'tbl_kategori';
    protected $primaryKey           = 'idKategori';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['jenisKategori'];
    
    
    public function getKategori()
    {
        return $this->findAll();
    }
 
}