<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_carousel;
 
class Model_carousel extends Model
{
    protected $table                = 'tbl_carousel';
    protected $primaryKey           = 'idCarousel';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['gambar'];
    
    
    public function getCarousel()
    {
        return $this->findAll();
    }
 
}