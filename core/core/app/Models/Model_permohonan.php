<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_permohnan;
 
class Model_permohonan extends Model
{
    protected $table                = 'tbl_permohonan';
    protected $primaryKey           = 'idPermohonan';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['jenisPermohonan','berkasPemohon','keterangan','status','berkas','nomorIndukKependudukan','tanggalPermohonan','tanggalSelesai'];
    
    
    public function getPermohonan()
    {
        return $this->findAll();
    }
 
}