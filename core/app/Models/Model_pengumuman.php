<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_pengumuman;
 
class Model_pengumuman extends Model
{
    protected $table                = 'tbl_pengumuman';
    protected $primaryKey           = 'idPengumuman';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeKecamatan','kodeDesa','tanggalPengumuman','pengumuman'];
}