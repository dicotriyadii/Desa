<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_pembelanjaan;
 
class Model_pembelanjaan extends Model
{
    protected $table                = 'tbl_pembelanjaan';
    protected $primaryKey           = 'idPembelanjaan';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeKecamatan','kodeDesa','jenisPembelanjaan','jumlah','statusPembelanjaan','tahun'];
}