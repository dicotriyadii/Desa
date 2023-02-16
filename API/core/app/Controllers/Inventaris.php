<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_warga;
use App\Models\Model_inventaris;
 
class Inventaris extends ResourceController
{ 
    // create a product
    public function create()
    {           
        //variable
        $warga              = new Model_warga();
        $inventaris         = new Model_inventaris();
        $nik                = $this->request->getVar('nik');
        $token              = $this->request->getVar('token');
        $kodeKecamatan      = $this->request->getVar('kodeKecamatan');
        $kodeDesa           = $this->request->getVar('kodeDesa');
        $kodeDasaWisma      = $this->request->getVar('kodeDasaWisma');
        $namaBarang         = $this->request->getVar('namaBarang');
        $asalBarang         = $this->request->getVar('asalBarang');
        $tgl                = $this->request->getVar('tgl');
        $jumlah             = $this->request->getVar('jumlah');
        $tempatPenyimpanan  = $this->request->getVar('tempatPenyimpanan');
        $kondisiBarang      = $this->request->getVar('kondisiBarang');
        $keterangan         = $this->request->getVar('keterangan');
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
            $cekInventaris = $inventaris->where('nama_barang',$namaBarang)->findAll();
            if($cekInventaris != null) {
              $response = [
                'status'    => 400,
                'messages'  => "Barang Sudah terdaftar"
            ];  
            return $this->respond($response);  
            }
            $data = [
                'kode_kecamatan'        => $kodeKecamatan,
                'kode_desa'             => $kodeDesa,
                'kode_dasa_wisma'       => $kodeDasaWisma,
                'nama_barang'           => $namaBarang,
                'asal_barang'           => $asalBarang,
                'tgl'                   => $tgl,
                'jumlah'                => $jumlah,
                'tempatPenyimpanan'     => $tempatPenyimpanan,
                'kondisi_barang'        => $kondisiBarang,
                'keterangan'            => $keterangan,
            ];
            $inventaris->insert($data);
            $response = $data;
            return $this->respond($response);    
        }  
    }
}