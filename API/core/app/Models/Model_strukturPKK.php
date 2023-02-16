<?php namespace App\Models;
 
use CodeIgniter\Model;
use App\Models\Model_strukturPKK;
 
class Model_strukturPKK extends Model
{
    protected $table                = 'tbl_struktur_pkk';
    protected $primaryKey           = 'idAnggotaPKK';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['nik','jabatan','keterangan','gambar'];
    
    
    public function getStrukturPKK()
    {
    	$db      = \Config\Database::connect();
		$builder = $db->table('tbl_struktur_pkk');
		$builder->select('*');
		$builder->join('tbl_warga', 'tbl_warga.nomorIndukKependudukan = tbl_struktur_pkk.nik');
		return $builder->get()->getResultArray();
    }
 
}