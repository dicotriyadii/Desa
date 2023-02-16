<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_warga;
use App\Models\Model_makananPokok;
 
class TambahMakananPokok extends ResourceController
{ 
    // create a product
    public function create()
    {           
        //variable
        $warga              = new Model_warga();
        $makananPokok       = new Model_makananPokok();
        $nik                = $this->request->getVar('nik');
        $token              = $this->request->getVar('token');
        $valueMakananPokok   = $this->request->getVar('makananPokok');
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
            $data = [
                'makanan_pokok' => $valueMakananPokok
            ];
            $cekMakananPokok = $makananPokok->where('makanan_pokok',$valueMakananPokok)->findAll();
            if($cekMakananPokok != null){
                $response = [
                    'status'    => 400,
                    'messages'  => "Data Sudah Ada !!"
                ];  
                return $this->respond($response,400);
            }
            $makananPokok->insert($data);
            $response = [
                'status'    => 200,
                'messages'  => "Jenis Makanan Pokok Berhasil Di Tambah"
            ];  
            return $this->respond($response);    
        }  
    }
}