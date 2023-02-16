<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_warga;
use App\Models\Model_pengeluaranKeuangan;
 
class DataPengeluaranKeuangan extends ResourceController
{ 
    // create a product
    public function create()
    {           
        //variable
        $warga                      = new Model_warga();
        $dataPengeluaranKeuangan    = new Model_pengeluaranKeuangan();
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
            $data = $dataPengeluaranKeuangan->getPengeluaranKeuangan();
            $response = $data;
            return $this->respond($response);    
        }  
    }
}