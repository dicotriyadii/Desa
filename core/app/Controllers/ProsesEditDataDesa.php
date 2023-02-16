<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_desa;
use App\Models\Model_log;

class ProsesEditDataDesa extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session        = session();
        $desa           = new Model_desa();
        $log            = new Model_log();
        $idDesa         = $this->request->getPost('idDesa');
        $data = [
            'namaDesa'      => $this->request->getPost('namaDesa'),
            'alamatDesa'    => $this->request->getPost('alamatDesa'),
            'linkPetaDesa'  => $this->request->getPost('linkPetaDesa'),
            'namaKecamatan'  => $this->request->getPost('namaKecamatan')
        ];
        $desa->update($idDesa,$data);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Desa',
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan Data desa berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminDataDesa');
    }
 
}