<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_warga;
use App\Models\Model_strukturPKK;
 
class LoginDasaWisma extends ResourceController
{ 
    // create a product
    public function create()
    {           
        //variable
        $warga  = new Model_warga();
        $pkk    = new Model_strukturPKK();
        $nik    = $this->request->getVar('nik');
        $pass   = $this->request->getVar('password');
        $cekWarga = $warga->where('nomorIndukKependudukan',$nik)->findAll();
        //Cek User dan Cek Warga
        if($cekWarga != null){
            $cekWargaPassword   = password_verify($pass,$cekWarga[0]['password']);
            if($cekWargaPassword == true){
                $cekPKK = $pkk->where('nik',$nik)->findAll();    
                if($cekPKK != null){
                    $token = rand(10,1000);
                    $updateToken = [
                        'token' => $token
                    ];
                    $warga->update($cekWarga[0]['idWarga'],$updateToken);
                    $dataUpdate = $warga->where('nomorIndukKependudukan',$nik)->findAll();
                    $response   = $dataUpdate;
                }else{
                    $response = [
                        'status' => 400,
                        'messages' => 'Data anda tidak terdaftar sebagai anggota PKK'
                    ];
                    return $this->respond($response,400);
                }
            }
            else{
                $response = [
                    'status' => 400,
                    'messages' => 'Password Anda Salah !!, Silahkan Coba Lagi'
                ];
                return $this->respond($response,400);
            }
        }else{
            $response = [
                'status' => 400,
                'messages' => 'Mohon maaf, Nomor Induk Kependudukan anda tidak terdaftar di sistem kami'
            ];        
            return $this->respond($response,400);
        }
    return $this->respond($response);
    }
}