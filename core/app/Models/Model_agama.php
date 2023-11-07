<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_agama;
 
class Model_agama extends Model
{
    protected $table                = 'tbl_agama';
    protected $primaryKey           = 'idAgama';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['jenisAgama','jumlah'];
}