<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_pemberitahuan;
use App\Models\Model_log;

class ProsesEditTambahPemberitahuan extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $pemberitahuan       = new Model_pemberitahuan();
        $log                 = new Model_log();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');  
        $idPemberitahuan     = $this->request->getPost('idPemberitahuan');        
        $data = [
            'pemberitahuan'        => $this->request->getPost('pemberitahuan'),
        ];
        $pemberitahuan->update($idPemberitahuan,$data);
        //Log
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Edit pemberitahuan '. $this->request->getPost('pengumuman'),
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