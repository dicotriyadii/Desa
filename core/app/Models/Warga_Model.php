<?php

namespace App\Models;

use CodeIgniter\Model;

class Warga_Model extends Model
{
    protected $table      = 'tbl_warga';
    protected $primaryKey = 'idWarga';
    protected $allowedFields = ['password'];
}
