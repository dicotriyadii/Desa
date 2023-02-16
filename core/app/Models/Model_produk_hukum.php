<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_produk_hukum;
 
class Model_produk_hukum extends Model
{
    protected $table                = 'tbl_produk_hukum';
    protected $primaryKey           = 'idProdukHukum';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['namaProdukHukum','berkasProdukHukum','keterangan','authorProdukHukum','tanggalUpload'];
    
    
    public function getProdukHukum()
    {
        return $this->findAll();
    }
 
}