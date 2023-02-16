<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class profileModel extends Model
{
    protected $table = 'tblprofile';
    protected $primaryKey = 'idProfile';
    protected $allowedFields = ['nama','alamat','kontak','gambar','keterangan'];
}
