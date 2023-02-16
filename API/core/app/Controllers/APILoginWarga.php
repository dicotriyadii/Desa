<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_warga;
 
class APILoginWarga extends ResourceController
{ 
    
    // create a product
    public function create()
    {           
        $warga   = new Model_warga();
        $jumlahHash = [
            'cost' => 10,
        ];
        $cekWarga = $warga->where('nomorIndukKependudukan',$this->request->getVar('nik'))->findAll();
die(print_r($cekWarga));
        if($cekWarga == null){
            $response = [
                'status' => 400,
                'error'  => null,
                'messages' =>'Data Warga tidak ditemukan'
            ];
            return $this->respond($response,400);
        }else{
            $cekPassword   = password_verify($this->request->getVar('password'),$cekWarga[0]['password']);
            if($cekPassword == false){
                $response = [
                    'status' => 400,
                    'error'  => null,
                    'messages' => 'Password Salah'
                ];
                return $this->respond($response,400);
            }            
            return $this->respond($cekWarga,200);
        }
    }
}