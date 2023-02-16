<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_warga;
use App\Models\Model_user;
use App\Models\Model_strukturPKK;
use App\Models\Model_struktur_pemerintah_desa;
use App\Models\Model_data; 

class LoginWarga extends ResourceController
{ 
    // create a product
    public function create()
    {           
        //variable
        $warga          = new Model_warga();
        $user           = new Model_user();
        $pkk            = new Model_strukturPKK();
        $pemerintahDesa = new Model_struktur_pemerintah_desa();
        $data           = new Model_data();
        $nik            = $this->request->getVar('nik');
        $pass           = $this->request->getVar('password');
        // proses Data
        // Cek Warga
        $cekWarga = $warga->where('nomorIndukKependudukan',$nik)->findAll();
        if($cekWarga != null){
            // Cek Admin
            $cekAdmin           = $user->where('username',$nik)->findAll();
            $cekPKK             = $pkk->where('nik',$nik)->findAll();
            $cekPemerintahDesa  = $pemerintahDesa->where('nik',$nik)->findAll();
            if($cekPemerintahDesa != null){
                $cekWargaPassword   = password_verify($pass,$cekWarga[0]['password']);                
                if($cekWargaPassword == true){
                    $token = rand(10,1000);
                    $updateToken = [
                        'token' => $token
                    ];
                    $warga->update($cekWarga[0]['idWarga'],$updateToken);
                    $dataResponse = $data->getStrukturPemdesDetail($nik); 
                    $response[] = [
                        'status' => 200,
                        'messages' => 'Login Berhasil',
                        'hakAkses' => 'pemerintahDesa',
                        'data' => $dataResponse
                    ];
                }else{
                    $response = [
                        'status' => 400,
                        'messages' => 'Anda Bukan anggota PKK, password anda salah, Silahkan Coba Lagi'
                    ];
                    return $this->respond($response,400);  
                }
            }else if($cekPKK != null){
                $cekWargaPassword   = password_verify($pass,$cekWarga[0]['password']);                
                if($cekWargaPassword == true){
                    $token = rand(10,1000);
                    $updateToken = [
                        'token' => $token
                    ];
                    $warga->update($cekWarga[0]['idWarga'],$updateToken);
                    $dataResponse = $data->getStrukturPKKDetail($nik); 
                    $response[] = [
                        'status' => 200,
                        'messages' => 'Login Berhasil',
                        'hakAkses' => 'pkk',
                        'data' => $dataResponse
                    ];
                }else{
                    $response = [
                        'status' => 400,
                        'messages' => 'Anda Bukan anggota PKK, password anda salah, Silahkan Coba Lagi'
                    ];
                    return $this->respond($response,400);  
                }
            }else{
                $cekWargaPassword   = password_verify($pass,$cekWarga[0]['password']);
                if($cekWargaPassword == true){
                    $token = rand(10,1000);
                    $updateToken = [
                        'token' => $token
                    ];
                    $warga->update($cekWarga[0]['idWarga'],$updateToken);
                    $dataResponse = $data->getWargaDetail($nik); 
                    $response []= [
                        'status' => 200,
                        'messages' => 'Login Berhasil',
                        'hakAkses' => 'warga',
                        'data' => $dataResponse
                    ];
                }else{
                    $response = [
                        'status' => 400,
                        'messages' => 'Password yang anda masukkan salah, Silahkan Coba Lagi'
                    ];
                    return $this->respond($response,400);  
                }

            }
        }else{
            $response[] = [
                'status' => 400,
                'messages' => 'Mohon maaf, Nomor Induk Kependudukan anda tidak terdaftar di sistem kami'
            ];  
            return $this->respond($response,400);      
        }
    return $this->respond($response);
    }
}