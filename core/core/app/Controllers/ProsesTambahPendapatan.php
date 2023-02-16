<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_pendapatan;
use App\Models\Model_log;

class ProsesTambahPendapatan extends ResourceController
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
        $pendapatan->insert($data);
        
        //Log
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Dana Pendapatan Berhasil Di Tambah ',
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Dana Pendapatan Berhasil Di Tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminDanaPendapatan');
    }

    public function hapusDanaPendapatan($id=null)
    {
        $session        = session();
        $pendapatan     = new Model_pendapatan();
        $log            = new Model_log();
        $data           = $pendapatan->where('idPendapatan',$id)->findAll();  
        $hapus          = $pendapatan->delete($id);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penghapusan Pendapatan '.$data[0]['jenisPendapatan'],
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);   
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Dana Pendapatan berhasil di hapus"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminDanaPendapatan');
    }
 
}