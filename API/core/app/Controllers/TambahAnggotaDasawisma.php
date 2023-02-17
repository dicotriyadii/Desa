<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_warga;
use App\Models\Model_AnggotaDasawisma;
use App\Models\Model_strukturPKK;
 
class TambahAnggotaDasawisma extends ResourceController
{ 
    // create a product
    public function create()
    {           
        //variable
        $warga                      = new Model_warga();
        $anggotaDasawisma           = new Model_AnggotaDasawisma();
        $pkk                        = new Model_strukturPKK();
        $nik                        = $this->request->getVar('nik');
        $token                      = $this->request->getVar('token');
        $valueNikAnggota            = $this->request->getVar('nikAnggota');
        $valueIdDasaWisma           = $this->request->getVar('idDasawisma');
        $valueJabatanAnggota        = $this->request->getVar('jabatanAnggota');
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
            $cekHakAksesKetua       = $anggotaDasawisma->where('nik',$nik)->findAll();
            $cekHakAksesAnggotaPKK  = $pkk->where('nik',$nik)->findAll();
            $cekAnggotaDasawisma    = $anggotaDasawisma->where('nik',$valueNikAnggota)->findAll();
            if($cekHakAksesAnggotaPKK == null){
                if($cekHakAksesKetua[0]['jabatan'] != 'ketua') {
                    $response = [
                    'status'    => 400,
                    'messages'  => "Anda tidak diperbolehkan menambah anggota dasawisma"
                ];  
                return $this->respond($response,400);                    
                }
            }
            if($cekAnggotaDasawisma != null){
                $response = [
                    'status'    => 400,
                    'messages'  => "Data sudah ada, silahkan coba lagi"
                ];  
                return $this->respond($response,400);
            }
            $data = [
                'nik' => $valueNikAnggota,
                'idDasawisma' => $valueIdDasaWisma,
                'jabatan' => $valueJabatanAnggota
            ];
            $anggotaDasawisma->insert($data);
            $response = [
                'status'    => 200,
                'messages'  => "Anggota Dasawisma Berhasil Di Tambah"
            ];  
            return $this->respond($response);    
        }  
    }
}