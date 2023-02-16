<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_tema;
use App\Models\Model_log;

class ProsesRubahTema extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session        = session();
        $tema           = new Model_tema();
        $log            = new Model_log();
        $data = [
            'warna'  => $this->request->getPost('warna')
        ];
        $tema->update('1',$data);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah warna website',
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan warna website berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/formRubahTema');
    }
 
}