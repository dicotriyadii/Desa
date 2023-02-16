<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_inventaris;
 
class Model_inventaris extends Model
{
    protected $table                = 'tb_inventaris';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kode_kecamatan','kode_desa','kode_dasa_wisma','nama_barang','asal_barang','tgl','jumlah','tempat_penyimpanan','kondisi_barang','keterangan'];
    
    
    public function getInventaris()
    {
        return $this->findAll();
    }
 
}