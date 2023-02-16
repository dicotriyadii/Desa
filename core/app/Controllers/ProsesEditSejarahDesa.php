<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_sejarah_desa;
use App\Models\Model_log;

class ProsesEditSejarahDesa extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session        = session();
        $sejarahDesa    = new Model_sejarah_desa();
        $log            = new Model_log();
        $idSejarahDesa   = $this->request->getPost('idSejarahDesa');
        $data = [
            'keteranganSejarahDesa'  => $this->request->getPost('keteranganSejarahDesa')
        ];
        $sejarahDesa->update($idSejarahDesa,$data);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Sejarah Desa',
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan Sejarah Desa berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminSejarahDesa');
    }
 
}