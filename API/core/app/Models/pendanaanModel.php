<?php namespace App\Models;
 
use CodeIgniter\Model;

class pendanaanModel extends Model
{
    protected $table = 'tblpenerimaandana';
    protected $primaryKey = 'idPenerimaanDana';
    protected $allowedFields = ['namaUser','jumlah','tanggal','bulan','tahun','status','idPembayaran','nomorTelepon','metodePembayaran','jenisPembayaran','keterangan'];
}