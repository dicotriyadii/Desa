<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_warga;
use App\Models\Model_pemasukkanKeuangan;
 
class PemasukkanKeuangan extends ResourceController
{ 
    // create a product
    public function create()
    {           
        //variable
        $warga                      = new Model_warga();
        $PemasukkanKeuangan         = new Model_pemasukkanKeuangan();
        $nik                        = $this->request->getVar('nik');
        $token                      = $this->request->getVar('token');
        $kodeKecamatan              = $this->request->getVar('kodeKecamatan');
        $kodeDesa                   = $this->request->getVar('kodeDesa');
        $kodeDasaWisma              = $this->request->getVar('kodeDasaWisma');
        $sumberDanaPemasukkan       = $this->request->getVar('sumberDanaPemasukkan');
        $uraianPemasukkan           = $this->request->getVar('uraianPemasukkan');
        $nomorBuktiKasPemasukkan    = $this->request->getVar('nomorBuktiKasPemasukkan');
        $jumlahPemasukkan           = $this->request->getVar('jumlahPemasukkan');
        $tgl                        = $this->request->getVar('tgl');
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
            $cekNomorBukti = $PemasukkanKeuangan->where('nomor_bukti_kas_pemasukkan',$nomorBuktiKasPemasukkan)->findAll();
            if($cekNomorBukti != null) {
              $response = [
                'status'    => 400,
                'messages'  => "Nomor Bukti Kas Sudah Terdaftar"
            ];  
            return $this->respond($response);  
            }
            $data = [
                'kode_kecamatan'                => $kodeKecamatan,
                'kode_desa'                     => $kodeDesa,
                'kode_dasa_wisma'               => $kodeDasaWisma,
                'sumber_dana_pemasukkan'        => $sumberDanaPemasukkan,
                'uraian_pemasukkan'             => $uraianPemasukkan,
                'nomor_bukti_kas_pemasukkan'    => $nomorBuktiKasPemasukkan,
                'jumlah_penerimaan'             => $jumlahPemasukkan,
                'tgl'                           => $tgl,
            ];
            $PemasukkanKeuangan->insert($data);
            $response = $data;
            return $this->respond($response);    
        }  
    }
}