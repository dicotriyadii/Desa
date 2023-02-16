<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_tema;
 
class Model_tema extends Model
{
    protected $table                = 'tbl_tema';
    protected $primaryKey           = 'idWarna';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['warna'];

    public function getTema()
    {
        return $this->findAll();
    }
 
}