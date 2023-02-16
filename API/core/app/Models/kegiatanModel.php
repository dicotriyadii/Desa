<?php namespace App\Models;
 
use CodeIgniter\Model;

class KegiatanModel extends Model
{
    protected $table = 'tblkegiatan';
    protected $primaryKey = 'idKegiatan';
    protected $allowedFields = ['namaKegiatan','tanggalKegiatan','keterangan'];
}