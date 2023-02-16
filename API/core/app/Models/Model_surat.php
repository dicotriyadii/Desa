<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_surat;
 
class Model_surat extends Model
{
    protected $table                = 'tbl_surat';
    protected $primaryKey           = 'idSurat';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['jenisSurat','nomorSurat','tanggalPermohonan','tanggalSurat','bulanSurat','nikPemohon','operator','kades','status','link'];
    
    
    public function getSurat()
    {
        return $this->findAll();
    }
 
}