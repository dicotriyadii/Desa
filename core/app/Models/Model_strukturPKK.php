<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_strukturPKK;
 
class Model_strukturPKK extends Model
{
    protected $table                = 'tbl_struktur_pkk';
    protected $primaryKey           = 'idAnggotaPKK';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeKecamatan','kodeDesa','nik','namaAnggota','jabatan','keterangan','gambar'];
}