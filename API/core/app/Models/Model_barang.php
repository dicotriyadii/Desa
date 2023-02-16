<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_user;
 
class Model_barang extends Model
{
    protected $table                = 'tbl_barang';
    protected $primaryKey           = 'idBarang';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeBarang','namaBarang','jumlah'];
}