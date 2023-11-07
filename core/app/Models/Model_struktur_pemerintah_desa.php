<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_struktur_pemerintah_desa;
 
class Model_struktur_pemerintah_desa extends Model
{
    protected $table                = 'tbl_struktur_pemerintah_desa';
    protected $primaryKey           = 'idAnggotaPemerintah';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['nik','namaAnggota','jabatan','gambar','keterangan'];
}