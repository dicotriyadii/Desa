<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_warga;
use App\Models\Model_data;
 
class MakananPokok extends ResourceController
{ 
    // create a product
    public function create()
    {           
        //variable
        $warga          = new Model_warga();
        $data           = new Model_data();
        $nik            = $this->request->getVar('nik');
        $token          = $this->request->getVar('token');
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
            $data = $data->getMakananPokokAll();
            $response = $data;
            return $this->respond($response);    
        }  
    }
}