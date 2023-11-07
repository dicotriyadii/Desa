<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_kontak;
 
class Model_kontak extends Model
{
    protected $table                = 'tbl_kontak';
    protected $primaryKey           = 'idKontak';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeKecamatan','kodeDesa','nomorKontak','emailKontak','facebookKontak','instagramKontak','youtubeKontak'];
    
}