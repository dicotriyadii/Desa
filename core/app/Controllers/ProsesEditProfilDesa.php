<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_profil_desa;
use App\Models\Model_log;

class ProsesEditProfilDesa extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session        = session();
        $profilDesa     = new Model_profil_desa();
        $log            = new Model_log();
        $idProfilDesa   = $this->request->getPost('idProfilDesa');
        $data = [
            'keteranganDesa'  => $this->request->getPost('keteranganDesa')
        ];
        $profilDesa->update($idProfilDesa,$data);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Profil Desa',
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan Profil Desa berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminProfilWilayahDesa');
    }
 
}