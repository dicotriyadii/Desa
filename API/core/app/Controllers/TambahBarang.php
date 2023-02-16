<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_user;
use App\Models\Model_log;
use App\Models\Model_barang;
use App\Models\Model_data;
 
class TambahBarang extends ResourceController
{ 
    // create a product
    public function create()
    {           
        //variable
        $user               = new Model_user();
        $log                = new Model_log();
        $barang             = new Model_barang();
        $data               = new Model_data();
        $username           = $this->request->getVar('username');
        $token              = $this->request->getVar('token');
        $dataKodeBarang     = $this->request->getVar('dataKodeBarang');
        // // Validasi Token
        $validasi = [
            'username' => $username,
            'token' => $token
        ];
        $cekToken  = $user->where($validasi)->findAll();
        if($cekToken == null){
            $response = [
                'status'    => 400,
                'messages'  => "Tidak bisa diakses !!, silahkan login terlebih dahulu"
            ];  
            return $this->respond($response,400);          
        }else{
            // Proses Data
            $cekDataBarang = $barang->where('kodeBarang',$dataKodeBarang)->findAll();
            if($cekDataBarang == null){
                // LOG
                $dataLog = [
                    'idUser' => $cekToken[0]['idUser'],
                    'timeStamp' => date('Y-m-d'),
                    'keterangan' => "Penjumlahan barang gagal, barang tidak di temukan di sistem"
                ];
                $log->insert($dataLog);
                $response = [
                    'status'    => 400,
                    'messages'  => "barang tidak di temukan sistem"
                ];  
                return $this->respond($response,400);
            }else{
                $idBarang = $cekDataBarang[0]['idBarang'];
                $updateJumlah = $cekDataBarang[0]['jumlah'] + 1;
                $dataUpdate = [
                    'jumlah' => $updateJumlah
                ];
                $barang->update($idBarang,$dataUpdate);
                // LOG
                $dataLog = [
                    'idUser' => $cekToken[0]['idUser'],
                    'timeStamp' => date('Y-m-d'),
                    'keterangan' => "Penjumlahan barang ".$cekDataBarang[0]['namaBarang']." berhasil"
                ];
                $log->insert($dataLog);
                $dataUpdate = $data->getBarang();
            }
            return $this->respond($dataUpdate,200);
        }  
    }
}