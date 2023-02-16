<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_kontak;
use App\Models\Model_log;

class ProsesEditKontak extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session        = session();
        $kontak         = new Model_kontak();
        $log            = new Model_log();
        $idKontak       = $this->request->getPost('idKontak');
        $data = [
            'nomorKontak'       => $this->request->getPost('nomorKontak'),
            'emailKontak'       => $this->request->getPost('emailKontak'),
            'facebookKontak'    => $this->request->getPost('facebookKontak'),
            'instagramKontak'   => $this->request->getPost('instagramKontak'),
            'youtubeKontak'     => $this->request->getPost('youtubeKontak')
        ];
        $kontak->update($idKontak,$data);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Kontak',
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan Kontak berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminKontak');
    }
 
}