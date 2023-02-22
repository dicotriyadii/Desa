<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_warga;
use App\Models\Model_AnggotaDasawisma;
use App\Models\Model_strukturPKK;
 
class HapusAnggotaDasawisma extends ResourceController
{ 
    // create a product
    public function create()
    {           
        //variable
        $warga                      = new Model_warga();
        $anggotaDasawisma           = new Model_AnggotaDasawisma();
        $pkk                        = new Model_strukturPKK();
        $nik                        = $this->request->getVar('nik');
        $token                      = $this->request->getVar('token');
        $valueNikAnggota            = $this->request->getVar('nikAnggota');
        // Validasi Token
        $dataValidasi = [
            'nomorIndukKependudukan' => $nik,
            'token' => $token
        ];
        $cekTokenWarga  = $warga->where($dataValidasi)->findAll();
        if($cekTokenWarga == null){
            $response = [
                'status'    => 400,
                'messages'  => "Tidak bisa diakses !!, silahkan login terlebih dahulu"
            ];  
            return $this->respond($response,400);          
        }else{
            // Proses Data
            $cekAnggotaDasawisma    = $anggotaDasawisma->where('nik',$valueNikAnggota)->findAll();
            if($cekAnggotaDasawisma == null){
                $response = [
                    'status'    => 400,
                    'messages'  => "Data sudah tidak ada, silahkan coba lagi"
                ];  
                return $this->respond($response,400);
            }
            $anggotaDasawisma->delete($cekAnggotaDasawisma[0]['idUserDasawisma']);
            $response = [
                'status'    => 200,
                'messages'  => "Anggota Dasawisma Berhasil Di Hapus"
            ];  
            return $this->respond($response);    
        }  
    }
}