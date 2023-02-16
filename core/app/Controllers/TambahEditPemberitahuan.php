<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_pemberitahuan;
use App\Models\Model_log;

class tambahEditPemberitahuan extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $pemberitahuan       = new Model_pemberitahuan();
        $log                 = new Model_log();
        $idPemberitahuan     = $this->request->getPost('idPemberitahuan');        
        $data = [
            'pemberitahuan'        => $this->request->getPost('pemberitahuan'),
        ];
        $pemberitahuan->update($idPemberitahuan,$data);
        //Log
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Edit pemberitahuan '. $this->request->getPost('pengumuman'),
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Pemberitahuan berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminPemberitahuan');
    }
}