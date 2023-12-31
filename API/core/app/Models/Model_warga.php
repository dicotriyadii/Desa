<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_warga;
 
class Model_warga extends Model
{
    protected $table                = 'tbl_warga';
    protected $primaryKey           = 'idWarga';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['nomorKartuKeluarga','nomorIndukKependudukan','namaWarga','tanggalLahir','jenisKelamin','golDarah','agama','statusKawin','pendidikanTerakhir','pendidikanDitempuh','pekerjaan','statusKeluarga','alamat','umur','RT','RW','dusun','desa','kecamatan','status','bpjs','penghasilan','password','token','kodeKecamatan','kodeDesa','kodeDusun'];
    
    public function getWarga()
    {
        return $this->findAll();
    }
 
}