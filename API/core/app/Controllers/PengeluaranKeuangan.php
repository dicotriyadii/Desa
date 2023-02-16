<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_warga;
use App\Models\Model_pengeluaranKeuangan;
 
class PengeluaranKeuangan extends ResourceController
{ 
    // create a product
    public function create()
    {           
        //variable
        $warga                      = new Model_warga();
        $PengeluaranKeuangan        = new Model_pengeluaranKeuangan();
        $nik                        = $this->request->getVar('nik');
        $token                      = $this->request->getVar('token');
        $kodeKecamatan              = $this->request->getVar('kodeKecamatan');
        $kodeDesa                   = $this->request->getVar('kodeDesa');
        $kodeDasaWisma              = $this->request->getVar('kodeDasaWisma');
        $sumberDanaPengeluaran      = $this->request->getVar('sumberDanaPengeluaran');
        $uraianPengeluaran          = $this->request->getVar('uraianPengeluaran');
        $nomorBuktiKasPengeluaran   = $this->request->getVar('nomorBuktiKasPengeluaran');
        $jumlahPengeluaran          = $this->request->getVar('jumlahPengeluaran');
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
            $cekNomorBukti = $PengeluaranKeuangan->where('nomor_bukti_kas_pengeluaran',$nomorBuktiKasPengeluaran)->findAll();
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
                'sumber_dana_pengeluaran'       => $sumberDanaPengeluaran,
                'uraian_pengeluaran'            => $uraianPengeluaran,
                'nomor_bukti_kas_pengeluaran'   => $nomorBuktiKasPengeluaran,
                'jumlah_pengeluaran'            => $jumlahPengeluaran,
                'tgl'                           => $tgl,
            ];
            $PengeluaranKeuangan->insert($data);
            $response = $data;
            return $this->respond($response);    
        }  
    }
}