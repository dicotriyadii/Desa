<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_warga;
use App\Models\Model_sumberAirKeluarga;
 
class TambahSumberAirKeluarga extends ResourceController
{ 
    // create a product
    public function create()
    {           
        //variable
        $warga                      = new Model_warga();
        $sumberAirKeluarga          = new Model_sumberAirKeluarga();
        $nik                        = $this->request->getVar('nik');
        $token                      = $this->request->getVar('token');
        $valueSumberAirKeluarga     = $this->request->getVar('sumberAirKeluarga');
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
                'jenis_sumber_air' => $valueSumberAirKeluarga
            ];
            $cekSumberAirKeluarga = $sumberAirKeluarga->where('jenis_sumber_air',$valueSumberAirKeluarga)->findAll();
            if($cekSumberAirKeluarga != null){
                $response = [
                    'status'    => 400,
                    'messages'  => "Data Sudah Ada !!"
                ];  
                return $this->respond($response,400);
            }
            $sumberAirKeluarga->insert($data);
            $response = [
                'status'    => 200,
                'messages'  => "Sumber Air Berhasil Di Tambah"
            ];  
            return $this->respond($response);    
        }  
    }
}