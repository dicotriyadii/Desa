<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_permohonan_informasi;
 
class Model_permohonan_informasi extends Model
{
    protected $table                = 'tbl_permohonan_informasi';
    protected $primaryKey           = 'idPermohonanInformasi';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['kodeDesa','kodeKecamatan','nikPemohon','namaPemohon','alamatPemohon','pekerjaanPemohon','nomorTeleponPemohon','emailPemohon','informasiPengajuan','alasanPengajuan'];
}