<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_struktur_bumdes;
 
class Model_struktur_bumdes extends Model
{
    protected $table                = 'tbl_struktur_bumdes';
    protected $primaryKey           = 'idAnggotaBumdes';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeKecamatan','kodeDesa','nik','namaAnggota','jabatan','keterangan','gambar'];
}