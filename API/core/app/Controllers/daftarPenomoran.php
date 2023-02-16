<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_surat;
use App\Models\Model_user;
use App\Models\Model_warga;
 
class DaftarPenomoran extends ResourceController
{ 
    // create a product
    public function create()
    {           
        //variable
        $surat              = new Model_surat();
        $user               = new Model_user();
        $warga              = new Model_warga();
        $nik                = $this->request->getVar('nik');
        $token              = $this->request->getVar('token');
        // Validasi Token
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

        // Proses Tampil Data
        $dataFilter = [
            'status' => 1,
            'nomorSurat' => '-'
        ];
        $dataSurat = $surat->where($dataFilter)->findAll();
        $response = $dataSurat;
        return $this->respond($response);
    }
}