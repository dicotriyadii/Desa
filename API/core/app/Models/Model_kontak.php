<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_kontak;
 
class Model_kontak extends Model
{
    protected $table                = 'tbl_kontak';
    protected $primaryKey           = 'idKontak';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['nomorKontak','emailKontak','facebookKontak','instagramKontak','youtubeKontak'];
    
    
    public function getKontak()
    {
        return $this->findAll();
    }
 
}