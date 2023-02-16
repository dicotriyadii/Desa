<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_surat;
use App\Models\Model_warga;
use App\Models\Model_struktur_pemerintah_desa;
 
class DaftarPermohonan extends ResourceController
{ 
    // create a product
    public function create()
    {           
        //variable
        $surat              = new Model_surat();
        $pemerintahDesa     = new Model_struktur_pemerintah_desa();
        $warga              = new Model_warga();
        $nik                = $this->request->getVar('nik');
        $token              = $this->request->getVar('token');
        // Validasi Token
        $cekPemerintahDesa = $pemerintahDesa->where('nik',$nik)->findAll();
        if($cekPemerintahDesa != null){
            $dataValidasi = [
                'nomorIndukKependudukan' => $nik,
                'token' => $token
            ];
            $cekTokenUser   = $warga->where($dataValidasi)->findAll();
            if($cekTokenUser == null){
                $response = [
                    'status'    => 400,
                    'messages'  => "Tidak bisa diakses !!, silahkan login terlebih dahulu"
                ];  
                return $this->respond($response);          
            }
            // Proses Persetujuan
            $jabatan    = strtolower($cekPemerintahDesa[0]['jabatan']);
            if($jabatan == "operator desa"){
                $dataFilter = [
                    'operator'  => 0,
                    'kades'     => 0,
                    'status'    => 0,
                ];
                $dataSurat = $surat->where($dataFilter)->findAll();
                $response = $dataSurat;
            }else if($jabatan == "kepala desa"){
                $dataFilter = [
                    'operator'  => 1,
                    'kades'     => 0,
                    'status'    => 0,
                ];
                $dataSurat = $surat->where($dataFilter)->findAll();
                $response = $dataSurat;           
            }            
        }else{
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
            $filterSurat = [
                'nikPemohon' => $nik,
            ];
            $dataSurat = $surat->where($filterSurat)->findAll();
            return $this->respond($dataSurat);
        }
        return $this->respond($response);
    }
}