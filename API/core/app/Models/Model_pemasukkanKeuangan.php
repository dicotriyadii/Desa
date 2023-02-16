<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_pengeluaranKeuangan;
 
class Model_pemasukkanKeuangan extends Model
{
    protected $table                = 'tb_pemasukkan_keuangan';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kode_kecamatan','kode_desa','kode_dasa_wisma','sumber_dana_pemasukkan','uraian_pemasukkan','nomor_bukti_kas_pemasukkan','jumlah_penerimaan','tgl'];
    
    public function getPemasukkanKeuangan()
    {
        return $this->findAll();
    }
 
}