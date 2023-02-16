<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_surat;
use App\Models\Model_warga;

class StatusPermohonan extends ResourceController
{ 
    // create a product
    public function create()
    {           
        //variable
        $surat      = new Model_surat();
        $warga      = new Model_warga();
        $nik        = $this->request->getVar('nik');
        $token      = $this->request->getVar('token');

        // Validasi Token
        $dataValidasi = [
            'nomorIndukKependudukan' => $this->request->getVar('nik'),
            'token' => $this->request->getVar('token')
        ];
        $cekToken   = $warga->where($dataValidasi)->findAll();
        if($cekToken == null){
            $response = [
                'status'    => 400,
                'messages'  => "Tidak bisa diakses !!, silahkan login terlebih dahulu"
            ];            
        return $this->respond($response,400);
        }
        
        // Pengecekan permohonan surat
        $dataPermohonan = [
            'nikPemohon' => $nik,
            'status'     => 0
        ];
        $cekPermohonan = $surat->where($dataPermohonan)->findAll();
        if($cekPermohonan != null){
            $response = [
                'status'    => 200,
                'messages'  => "Sedang Dalam Proses Persetujuan",
                'data'      => $cekPermohonan
            ];
        }else{
            $response = [
                'status'    => 200,
                'messages'  => "Tidak Ada Permohonan Surat",
            ];
        }
    return $this->respond($response);
    }
}