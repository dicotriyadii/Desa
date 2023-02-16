<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_user;
 
class APILoginAdmin extends ResourceController
{ 
    
    // create a product
    public function create()
    {           
        $pengguna   = new Model_user();
        $jumlahHash = [
            'cost' => 10,
        ];
        $cekPengguna = $pengguna->where('username',$this->request->getVar('username'))->findAll();
        if($cekPengguna == null){
            $response = [
                'status' => 400,
                'error'  => null,
                'messages' =>'Data Warga tidak ditemukan'
            ];
            return $this->respond($response,400);
        }else{
            $cekPassword   = password_verify($this->request->getVar('password'),$cekPengguna[0]['password']);
            if($cekPassword == false){
                return redirect()->to(base_url().'/login');
            }            
            return $this->respond($cekPengguna,200);
        }
    }
}