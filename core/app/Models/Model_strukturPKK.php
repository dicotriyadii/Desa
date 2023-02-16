<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_strukturPKK;
 
class Model_strukturPKK extends Model
{
    protected $table                = 'tbl_struktur_pkk';
    protected $primaryKey           = 'idAnggotaPKK';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['namaAnggota','jabatan','keterangan','gambar'];
    
    
    public function getStrukturPKK()
    {
        return $this->findAll();
    }
 
}