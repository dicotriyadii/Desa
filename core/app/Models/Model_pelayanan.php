<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_pelayanan;
 
class Model_pelayanan extends Model
{
    protected $table                = 'tbl_pelayanan';
    protected $primaryKey           = 'idPelayanan';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeKecamatanPelayanan','kodeDesaPelayanan','tanggalPermohonan','nama','alamat','nomorTelepon','jenisLayanan','keterangan','status'];
}