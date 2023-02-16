<?php namespace App\Models;
 
use CodeIgniter\Model;

class pencairanModel extends Model
{
    protected $table = 'tblpenyalurandana';
    protected $primaryKey = 'idPencairanDana';
    protected $allowedFields = ['penerimaDana','tanggal','jumlah','keterangan'];
}