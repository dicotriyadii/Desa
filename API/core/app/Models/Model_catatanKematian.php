<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_catatanKematian;
 
class Model_catatanKematian extends Model
{
    protected $table                = 'tb_catatan_kematian';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['catatan_status_ibu_id','catatan_status_ibu_meninggal','nama_bayi_meninggal','jenis_kelamin_meninggal','tgl_meninggal','sebab_meninggal','keterangan_meninggal'];
    
    public function getCatatanKematian()
    {
        return $this->findAll();
    }
 
}