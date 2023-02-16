<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_surat;
use App\Models\Model_user;
 
class PenomoranSurat extends ResourceController
{ 
    // create a product
    public function create()
    {           
        //variable
        $surat              = new Model_surat();
        $user               = new Model_user();
        $nik                = $this->request->getVar('nik');
        $token              = $this->request->getVar('token');
        $idSurat            = $this->request->getVar('idSurat');
        $nomorSurat         = $this->request->getVar('nomorSurat');
        
        // Validasi Token
        $dataValidasi = [
            'username' => $nik,
            'token' => $token
        ];
        $cekToken   = $user->where($dataValidasi)->findAll();
        if($cekToken == null){
            $response = [
                'status'    => 400,
                'messages'  => "Tidak bisa diakses !!, silahkan login terlebih dahulu"
            ];  
            return $this->respond($response);          
        }

        // Proses Peomoran Surat
        $updateData = [
            'nomorSurat' => $nomorSurat,
            'link'       => "http://localhost/APIDesaDigital/ProsesSurat/".$nik."/".$idSurat
        ];
        $surat->update($idSurat,$updateData);
        $response = [
            'status'    => 200,
            'messages'  => "Penomoran berkas berhasil",
            'data'      => $updateData,
        ];            
        return $this->respond($response);
    }
}