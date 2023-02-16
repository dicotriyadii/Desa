<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_dasawisma;
use App\Models\Model_warga;
 
class Dasawisma extends ResourceController
{ 
    // create a product
    public function create()
    {           
        //variable
        $dasawisma      = new Model_dasawisma();
        $warga          = new Model_warga();
        $nik            = $this->request->getVar('nik');
        $token          = $this->request->getVar('token');
        $kodeKecamatan  = $this->request->getVar('kodeKecamatan');
        $kodeDesa       = $this->request->getVar('kodeDesa');
        $kodeDusun      = $this->request->getVar('kodeDusun');
        $RT             = $this->request->getVar('RT');
        $RW             = $this->request->getVar('RW');
        $namaDasaWisma  = $this->request->getVar('namaDasaWisma');
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
            return $this->respond($response);          
        }else{
            // Proses Data
            $data = [
                'kode_kecamatan' => $kodeKecamatan,
                'kode_desa' => $kodeDesa,
                'kode_dusun' => $kodeDusun,
                'RT' => $RT,
                'RW' => $RW,
                'nama_desa_wisma' => $namaDasaWisma,
            ];
            $dasawisma->insert($data);
            $response = $data;
            return $this->respond($response);    
        }  
    }
}