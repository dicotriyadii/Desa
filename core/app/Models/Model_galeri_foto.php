<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_galeri_foto;
 
class Model_galeri_foto extends Model
{
    protected $table                = 'tbl_galeri_foto';
    protected $primaryKey           = 'idGaleri';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeKecamatan','kodeDesa','judul','jenis','status','link'];
}