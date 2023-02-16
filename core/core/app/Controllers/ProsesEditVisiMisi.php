<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_visiMisi;
use App\Models\Model_log;

class ProsesEditVisiMisi extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session        = session();
        $profilDesa     = new Model_visiMisi();
        $log            = new Model_log();
        $idVisiMisi     = $this->request->getPost('idVisiMisi');
        $data = [
            'visi'          => $this->request->getPost('visi'),
            'misi'          => $this->request->getPost('misi'),
            'keterangan'    => $this->request->getPost('keterangan')
        ];
        $profilDesa->update($idVisiMisi,$data);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'merubah data visi dan misi desa',
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan Visi dan Misi Desa berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminVisiMisi');
    }
 
}