<?php namespace App\Models;
 
use CodeIgniter\Model;

class loginModel extends Model
{
    protected $table = 'tblUser';
    protected $primaryKey = 'idUser';
    protected $allowedFields = ['namaUser','nomorTelepon','password'];
}