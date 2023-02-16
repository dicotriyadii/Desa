<?php

namespace App\Models;

use CodeIgniter\Model;

class CatatanKelahiran_Model extends Model
{
    protected $table      = 'tb_catatan_kelahiran';
    protected $primaryKey = 'id';
    protected $allowedFields = ['catatan_status_ibu_id', 'catatan_status_ibu', 'nama_bayi', 'jenis_kelamin', 'tgl_lahir', 'akte'];

    protected $curl;

    public function __construct()
    {
        $this->curl =  \Config\Services::curlrequest();
    }
}
