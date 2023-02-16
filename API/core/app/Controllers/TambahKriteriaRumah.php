<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_warga;
use App\Models\Model_kriteriaRumah;
 
class TambahKriteriaRumah extends ResourceController
{ 
    // create a product
    public function create()
    {           
        //variable
        $warga                      = new Model_warga();
        $kriteriaRumah              = new Model_kriteriaRumah();
        $nik                        = $this->request->getVar('nik');
        $token                      = $this->request->getVar('token');
        $valueKriteriaRumah         = $this->request->getVar('kriteriaRumah');
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
                'jenis_kriteria_rumah' => $valueKriteriaRumah
            ];
            $cekKriteriaRumah = $kriteriaRumah->where('jenis_kriteria_rumah',$valueKriteriaRumah)->findAll();
            if($cekKriteriaRumah != null){
                $response = [
                    'status'    => 400,
                    'messages'  => "Data Sudah Ada !!"
                ];  
                return $this->respond($response,400);
            }
            $kriteriaRumah->insert($data);
            $response = [
                'status'    => 200,
                'messages'  => "Kriteria Rumah Berhasil Di Tambah"
            ];  
            return $this->respond($response);    
        }  
    }
}