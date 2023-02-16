<?php namespace App\Models;
 
use CodeIgniter\Model;

class rekeningModel extends Model
{
    protected $table = 'tblrekening';
    protected $primaryKey = 'idRekening';
    protected $allowedFields = ['namaRekening','nomorRekening','namaBank'];
}