<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_warga;
use App\Models\Model_pemasukkanKeuangan;
 
class DataPemasukkanKeuangan extends ResourceController
{ 
    // create a product
    public function create()
    {           
        //variable
        $warga                      = new Model_warga();
        $dataPemasukkanKeuangan     = new Model_pemasukkanKeuangan();
        $nik                        = $this->request->getVar('nik');
        $token                      = $this->request->getVar('token');
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
            return $this->respond($response);          
        }else{
            // Proses Data
            $data = $dataPemasukkanKeuangan->getPemasukkanKeuangan();
            $response = $data;
            return $this->respond($response);    
        }  
    }
}