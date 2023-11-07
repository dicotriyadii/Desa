<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_userDasawisma;
 
class Model_userDasawisma extends Model
{
    protected $table                = 'tbl_user_dasawisma';
    protected $primaryKey           = 'idUserDasaWisma';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeKecamatanDasawisma','kodeDesaDasawisma','nik','idDasawisma','jabatan'];
}