<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_user;
 
class APILogin extends ResourceController
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
            return redirect()->to(base_url().'/login');
        }else{
            $cekPassword   = password_verify($this->request->getVar('password'),$cekPengguna[0]['password']);
            if($cekPassword == false){
                return redirect()->to(base_url().'/login');
            }            
            return $this->respond($cekPengguna,200);
        }
    }
}