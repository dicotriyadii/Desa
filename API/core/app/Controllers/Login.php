<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_warga;
use App\Models\Model_user;
 
class Login extends ResourceController
{ 
    // create a product
    public function create()
    {           
        //variable
        $warga  = new Model_warga();
        $user   = new Model_user();
        $nik    = $this->request->getVar('nik');
        $pass   = $this->request->getVar('password');
        $cekWarga = $warga->where('nomorIndukKependudukan',$nik)->findAll();
        //Cek User dan Cek Warga
        if($cekWarga != null){
            $cekUser = $user->where('username',$nik)->findAll();
            if($cekUser != null){
                $cekUserPassword   = password_verify($pass,$cekUser[0]['password']);
                if($cekUserPassword == true){
                    $dataWarga = $warga->where('nomorIndukKependudukan',$nik)->findAll();
                    $token = rand(10,1000);
                    $updateToken = [
                        'token' => $token
                    ];
                    $user->update($cekUser[0]['idUser'],$updateToken);
                    $dataUpdate = $user->where('username',$nik)->findAll();
                    $response   = $dataUpdate;   
                }else{
                    $response = [
                        'status' => 400,
                        'messages' => 'Password Anda Salah !!, NIK Anda Terdaftar Sebagai Admin, Silahkan Coba Lagi'
                    ];
                }    
            }else{
                $cekWargaPassword   = password_verify($pass,$cekWarga[0]['password']);
                if($cekWargaPassword == true){
                    $dataWarga = $warga->where('nomorIndukKependudukan',$nik)->findAll();
                    $token = rand(10,1000);
                    $updateToken = [
                        'token' => $token
                    ];
                    $warga->update($dataWarga[0]['idWarga'],$updateToken);
                    $dataUpdate = $warga->where('nomorIndukKependudukan',$nik)->findAll();
                    $response = $dataUpdate;
                }else{
                    $response = [
                        'status' => 400,
                        'messages' => 'Password Anda Salah !! Silahkan Coba Lagi'
                    ];  
                }
            }
        }else{
            $response = [
                'status' => 400,
                'messages' => 'Mohon maaf, Nomor Induk Kependudukan anda tidak terdaftar di sistem kami'
            ];        
        }
    return $this->respond($response);
    }
}