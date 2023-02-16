<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_warga;
use App\Models\Model_user;
 
class LoginAdmin extends ResourceController
{ 
    // create a product
    public function create()
    {           
        //variable
        $warga  = new Model_warga();
        $admin  = new Model_user();
        $nik    = $this->request->getVar('nik');
        $pass   = $this->request->getVar('password');
        // proses Data
        $cekWarga = $warga->where('nomorIndukKependudukan',$nik)->findAll();
        if($cekWarga != null){
            $cekAdmin = $admin->where('username',$nik)->findAll();
            if($cekAdmin != null) {
                $cekPassword   = password_verify($pass,$cekAdmin[0]['password']);    
                if($cekPassword == true){
                    $dataAdmin = $admin->where('username',$nik)->findAll();
                    $token = rand(10,1000);
                    $updateToken = [
                        'token' => $token
                    ];
                    $admin->update($dataAdmin[0]['idUser'],$updateToken);
                    $dataUpdate = $admin->where('username',$nik)->findAll();
                    $response = $dataUpdate;    
                }else{
                    $response = [
                        'status' => 400,
                        'messages' => 'Password Anda Salah !! Silahkan Coba Lagi'
                    ];
                    return $this->respond($response,400);
                }
            }else{
                $response = [
                    'status' => 400,
                    'messages' => 'Anda bukan sebagai admin'
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