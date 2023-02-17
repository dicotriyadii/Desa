<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_strukturPKK;
 
class Model_AnggotaDasawisma extends Model
{
    protected $table                = 'tbl_user_dasawisma';
    protected $primaryKey           = 'idUserDasawisma';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['nik','idDasawisma','jabatan']; 
}