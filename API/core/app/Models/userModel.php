<?php namespace App\Models;
 
use CodeIgniter\Model;

class userModel extends Model
{
    protected $table = 'tbluser';
    protected $primaryKey = 'idUser';
    protected $allowedFields = ['namaUser','nomorTelepon','password'];
}