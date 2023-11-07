<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_pemilik_tanah;
 
class Model_pemilik_tanah extends Model
{
    protected $table                = 'tbl_pemilik_tanah';
    protected $primaryKey           = 'idPemilikTanah';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeKecamatan','kodeDesa','nomorSurat','tanggalSurat','pemilikSebelumnya','pemilikSekarang','luasTanah','alamat','berkas'];
}