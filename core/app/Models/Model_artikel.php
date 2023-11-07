<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_artikel;
 
class Model_artikel extends Model
{
    protected $table                = 'tbl_artikel';
    protected $primaryKey           = 'idArtikel';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeKecamatan','kodeDesa','judulArtikel','authorArtikel','gambarArtikel','tanggalArtikel','keterangan','status'];
}