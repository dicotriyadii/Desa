<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_pengumuman;
use App\Models\Model_log;

class tambahEditPengumuman extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $pengumuman          = new Model_pengumuman();
        $log                 = new Model_log();
        $idPengumuman        = $this->request->getPost('idPengumuman');        
        $data = [
            'tanggalPengumuman' => date('y-m-d'),
            'pengumuman'        => $this->request->getPost('pengumuman'),
        ];
        $pengumuman->update($idPengumuman,$data);
        //Log
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Edit pengumuman '. $this->request->getPost('pengumuman'),
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Pengumuman berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminPengumuman');
    }
}