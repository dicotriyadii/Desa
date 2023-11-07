<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_informasi_publik;
 
class Model_informasi_publik extends Model
{
    protected $table                = 'tbl_informasi_publik';
    protected $primaryKey           = 'idInformasiPublik';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeKecamatan','kodeDesa','namaInformasiPublik','berkasInformasiPublik','keterangan','authorInformasiPublik','tanggalUpload'];
    
    
    public function getInformasiPublik()
    {
        return $this->findAll();
    }
 
}