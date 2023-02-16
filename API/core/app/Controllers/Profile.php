<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_warga;
use App\Models\Model_user;
 
class Profile extends ResourceController
{ 
    // create a product
    public function create()
    {           
        //variable
        $warga              = new Model_warga();
        $user               = new Model_user();
        $nik                = $this->request->getVar('nik');
        $token              = $this->request->getVar('token');

        // Validasi Token
        $cekUser = $user->where('username',$nik)->findAll();
        if($cekUser != null){
            $dataValidasi = [
                'username' => $nik,
                'token' => $token
            ];
            $cekTokenUser   = $user->where($dataValidasi)->findAll();
            if($cekTokenUser == null){
                $response = [
                    'status'    => 400,
                    'messages'  => "Tidak bisa diakses !!, silahkan login terlebih dahulu"
                ];  
                return $this->respond($response);          
            }
        }else if($cekUser == null) {
            $dataValidasi = [
                'nomorIndukKependudukan' => $nik,
                'token' => $token
            ];
            $cekTokenWarga   = $warga->where($dataValidasi)->findAll();
            if($cekTokenWarga == null){
                $response = [
                    'status'    => 400,
                    'messages'  => "Tidak bisa diakses !!, silahkan login terlebih dahulu"
                ];  
                return $this->respond($response);          
            }
        }

        // Proses Tampil Profile
        $dataWarga = $warga->where('nomorIndukKependudukan',$nik)->findAll();
        $response = [
            'status'    => 200,
            'messages'  => "Data warga ditemukan",
            'data'      => $dataWarga,
        ];            
        return $this->respond($response);
    }
}