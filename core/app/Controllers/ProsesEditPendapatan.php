<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_pendapatan;
use App\Models\Model_log;

class ProsesEditPendapatan extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session        = session();
        $pendapatan     = new Model_pendapatan();
        $log            = new Model_log();
        $data = [
            'jenisPendapatan'        => $this->request->getPost('jenisPendapatan'),
            'jumlah'                 => $this->request->getPost('jumlah'),
            'statusPendapatan'       => $this->request->getPost('statusPendapatan'),
            'tahun'                  => $this->request->getPost('tahun'),
        ];
        $pendapatan->update($this->request->getPost('idPendapatan'),$data);
        
        //Log
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Update Dana Pendapatan Berhasil',
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Update Dana Pendapatan Berhasil"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminDanaPendapatan');
    }
 
}