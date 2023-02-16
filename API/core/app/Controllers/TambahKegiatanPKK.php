<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_warga;
use App\Models\Model_kegiatanPKK;
 
class TambahKegiatanPKK extends ResourceController
{ 
    // create a product
    public function create()
    {           
        //variable
        $warga                      = new Model_warga();
        $kegiatanPKK                = new Model_kegiatanPKK();
        $nik                        = $this->request->getVar('nik');
        $token                      = $this->request->getVar('token');
        $valueKegiatanPKK           = $this->request->getVar('kegiatanPKK');
        // Validasi Token
        $dataValidasi = [
            'nomorIndukKependudukan' => $nik,
            'token' => $token
        ];
        $cekTokenWarga  = $warga->where($dataValidasi)->findAll();
        if($cekTokenWarga == null){
            $response = [
                'status'    => 400,
                'messages'  => "Tidak bisa diakses !!, silahkan login terlebih dahulu"
            ];  
            return $this->respond($response,400);          
        }else{
            // Proses Data
            $data = [
                'jenis_kegiatan' => $valueKegiatanPKK
            ];
            $cekKegiatan = $kegiatanPKK->where('jenis_kegiatan',$valueKegiatanPKK)->findAll();
            if($cekKegiatan != null){
                $response = [
                    'status'    => 400,
                    'messages'  => "Data Sudah Ada !!"
                ];  
                return $this->respond($response,400);
            }
            $kegiatanPKK->insert($data);
            $response = [
                'status'    => 200,
                'messages'  => "Jenis Kegiatan Berhasil Di Tambah"
            ];  
            return $this->respond($response);    
        }  
    }
}