<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_pengeluaranKeuangan;
 
class Model_pengeluaranKeuangan extends Model
{
    protected $table                = 'tb_pengeluaran_keuangan';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kode_kecamatan','kode_desa','kode_dasa_wisma','sumber_dana_pengeluaran','uraian_pengeluaran','nomor_bukti_kas_pengeluaran','jumlah_pengeluaran','tgl'];
    
    
    public function getPengeluaranKeuangan()
    {
        return $this->findAll();
    }
 
}