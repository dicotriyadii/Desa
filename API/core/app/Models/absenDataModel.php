<?php namespace App\Models;
 
use CodeIgniter\Model;

class absenDataModel extends Model
{
    protected $table = 'tblabsendata';
    protected $primaryKey = 'idAbsen';
    protected $allowedFields = ['nik','tanggal','absenPagi','absenSore','status'];
}