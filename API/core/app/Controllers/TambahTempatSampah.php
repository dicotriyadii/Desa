<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_warga;
use App\Models\Model_tempatSampah;
 
class TambahTempatSampah extends ResourceController
{ 
    // create a product
    public function create()
    {           
        //variable
        $warga                      = new Model_warga();
        $tempatSampah               = new Model_tempatSampah();
        $nik                        = $this->request->getVar('nik');
        $token                      = $this->request->getVar('token');
        $valueTempatSampah          = $this->request->getVar('tempatSampah');
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
                'jenis_tempat_sampah' => $valueTempatSampah
            ];
            $cekTempatSampah = $tempatSampah->where('jenis_tempat_sampah',$valueTempatSampah)->findAll();
            if($cekTempatSampah != null){
                $response = [
                    'status'    => 400,
                    'messages'  => "Data Sudah Ada !!"
                ];  
                return $this->respond($response,400);
            }
            $tempatSampah->insert($data);
            $response = [
                'status'    => 200,
                'messages'  => "Tempat Sampah Berhasil Di Tambah"
            ];  
            return $this->respond($response);    
        }  
    }
}