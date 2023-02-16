<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_permohonan;
// use App\Models\Model_warga;
 
class APIPermohonanSurat extends ResourceController
{ 
    public function index()
    {
        $model      = new Model_permohonan();
        $data       = $model->orderBy('idPermohonan','desc')->findAll();
        $response   = [
            'status' => 200,
            'error'  => null,
            'data'   => $data
        ];
        return $this->respond($data,200);
    }
    public function show($id = null)
    {
        $model = new Model_permohonan();
        $data = $model->orderBy('idPermohonan','desc')->where(['nomorIndukKependudukan' => $id])->findAll();
        if($data){
            $response   = [
                'status'    => 200,
                'message'   => 'Berhasil',
                'data'      => $data
            ];
            return $this->respond($data,200);
        }
    }
    // create a product
    public function create()
    {           
        $permohonan     = new Model_permohonan();
        $data = [
            'jenisPermohonan'           => $this->request->getVar('jenisPermohonan'),
            'nomorIndukKependudukan'    => $this->request->getVar('nik'),
            'berkasPemohon'             => "",
            'keterangan'                => $this->request->getVar('keterangan'),
            'status'                    => "Belum Proses",
            'berkas'                    => "",
            'tanggalPermohonan'         => date('Y-m-d'),
            'tanggalSelesai'            => "0000-00-00"
        ];
        $permohonan->insert($data);
        $response   = [
            'status'    => 200,
            'message'   => 'Berhasil',
            'data'      => $data
        ];
        return $this->respond($data,200);
    }
}