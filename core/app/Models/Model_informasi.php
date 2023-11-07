<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_informasi;
 
class Model_informasi extends Model
{
    protected $table                = 'tbl_informasi';
    protected $primaryKey           = 'idInformasi';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeDesa','kodeKecamatan','jenisInformasi','isiInformasi','penguasaInformasi','penanggungJawab','tempat','retensi','berkas'];
}