<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_pendapatan;
 
class Model_pelaksanaan extends Model
{
    protected $table                = 'tbl_pelaksanaan';
    protected $primaryKey           = 'idPelaksanaan';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeKecamatan','kodeDesa','jenisPelaksanaan','jumlah','statusPelaksanaan','tahun'];
}