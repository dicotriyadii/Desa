<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_surat;
use App\Models\Model_jenisSurat;
use App\Models\Model_warga;

 
class PermohonanSurat extends ResourceController
{ 
    // create a product
    public function create()
    {           
        //variable
        $surat          = new Model_surat();
        $jenisSurat     = new Model_jenisSurat();
        $warga          = new Model_warga();
        $nik            = $this->request->getVar('nik');
        $token          = $this->request->getVar('token');
        $idJenisSurat   = $this->request->getVar('idJenisSurat');
        
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
                'status'    => 400,
                'messages'  => "Sedang dalam permohonan surat, silahkan hubungi admin desa"
            ];
            return $this->respond($response,400);
        }
        //Pengecekan jenis surat 
        $cekJenisSurat = $jenisSurat->where('idJenisSurat',$idJenisSurat)->findAll();
        if($cekJenisSurat != null){
            $data       = [
                'jenisSurat' => $cekJenisSurat[0]['jenisSurat'],
                'nomorSurat' => "-",
                'tanggalPermohonan' => date('Y-m-d'),
                'tanggalSurat' => "0000-00-00",
                'bulanSurat' => "0",
                'nikPemohon' => $this->request->getVar('nik'),
                'kades' => "0",
                'link'=> "-"
            ];  
            $surat->insert($data);
            $response [] = [
                'status'    => 200,
                'messages'  => $data
            ];                        
        }else{
            $response = [
                'status'    => 400,
                'messages'  => "Jenis Surat Belum Tersedia, Silahkan Coba Lagi"
            ];
        }
    return $this->respond($response,200);
    }

    public function DownloadBerkas($id=null)
    {
        $surat  = new Model_surat();
        $data   = $surat->where('idSurat',$id)->findAll();
        return $this->response->download("berkasTTE/".$data[0]['link'].".pdf", null);
    }
}