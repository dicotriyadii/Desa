<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_warga;
 
class Model_warga extends Model
{
    protected $table                = 'tbl_warga';
    protected $primaryKey           = 'idWarga';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['nomorKartuKeluarga','nomorIndukKependudukan','namaWarga','tempatLahir','tanggalLahir','jenisKelamin','golDarah','agama','statusKawin','pendidikanTerakhir','pendidikanDitempuh','pekerjaan','statusKeluarga','alamat','kodeDesa','kodeKecamatan','kodeDusun','umur','RT','RW','dusun','desa','kecamatan','status','bpjs','penghasilan','password','noTelpon'];

    // public function getTotalKartuKeluarga (){
    // 	$db      = \Config\Database::connect();
	// 	$builder = $db->table('tbl_warga');
	// 	return $builder->groupBy('nomorKartuKeluarga')->countAllResults();    	
    // }

 
}