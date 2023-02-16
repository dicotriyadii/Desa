<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_berita;
 
class Model_berita extends Model
{
    protected $table                = 'tbl_berita';
    protected $primaryKey           = 'idBerita';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['judulBerita','authorBerita','gambarBerita','tanggalBerita','keterangan','status','kategori'];
    
    
    public function getBerita()
    {
        return $this->findAll();
    }
 
}