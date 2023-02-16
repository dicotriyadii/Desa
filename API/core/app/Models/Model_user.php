<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_user;
 
class Model_user extends Model
{
    protected $table                = 'tbl_user';
    protected $primaryKey           = 'idUser';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['username','password','nama','jabatan','hakAkses','pertanyaan','jawaban','token'];
    
    
    public function getUser()
    {
        return $this->findAll();
    }
 
}