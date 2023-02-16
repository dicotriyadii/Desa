<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_kegiatanPKK;
 
class Model_kegiatanPKK extends Model
{
    protected $table                = 'tb_kegiatan_pkk_yg_diikuti';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['jenis_kegiatan'];
    
    
    public function getKegiatanPKK()
    {
        return $this->findAll();
    }
 
}