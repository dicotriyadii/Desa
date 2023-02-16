<?php namespace App\Models;
 
use CodeIgniter\Model;

class absenUserModel extends Model
{
    protected $table = 'tblabsenuser';
    protected $primaryKey = 'idAbsenUser';
    protected $allowedFields = ['namaAbsenUser','nik','password','deviceId','jabatan','status'];
}