<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_catatanKelahiran;
 
class Model_catatanKelahiran extends Model
{
    protected $table                = 'tb_catatan_kelahiran';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['catatan_status_ibu_id','catatan_status_ibu','nama_bayi','jenis_kelamin','tgl_lahir','akte'];
    
    public function getCatatanKelahiran()
    {
        return $this->findAll();
    }
 
}