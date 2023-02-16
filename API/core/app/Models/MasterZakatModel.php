<?php namespace App\Models;
 
use CodeIgniter\Model;

class MasterZakatModel extends Model
{
    protected $table = 'masterzakat';
    protected $primaryKey = 'idZakat';
    protected $allowedFields = ['jenisZakat','detailZakat'];
}