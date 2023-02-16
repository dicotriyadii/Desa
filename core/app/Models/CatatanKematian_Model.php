<?php

namespace App\Models;

use CodeIgniter\Model;

class CatatanKematian_Model extends Model
{
    protected $table      = 'tb_catatan_kematian';
    protected $primaryKey = 'id';
    protected $allowedFields = ['catatan_status_ibu_id', 'catatan_status_ibu_meninggal', 'nama_bayi_meninggal', 'jenis_kelamin_meninggal', 'tgl_meninggal', 'sebab_meninggal', 'keterangan_meninggal'];

    protected $curl;

    public function __construct()
    {
        $this->curl =  \Config\Services::curlrequest();
    }
}
