<?php namespace App\Models;
 
use CodeIgniter\Model;

class CarouselModel extends Model
{
    protected $table = 'tblGambar';
    protected $primaryKey = 'idGambar';
    protected $allowedFields = ['namaGambar'];
}