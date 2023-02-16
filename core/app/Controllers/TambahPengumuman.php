<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_pengumuman;
use App\Models\Model_log;

class tambahPengumuman extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $pengumuman          = new Model_pengumuman();
        $log                 = new Model_log();        
        $data = [
            'tanggalPengumuman' => date('y-m-d'),
            'pengumuman'        => $this->request->getPost('pengumuman'),
        ];
        $pengumuman->insert($data);
        //Log
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'menambah pengumuman '. $this->request->getPost('pengumuman'),
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Pengumuman berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminPengumuman');
    }

    public function hapusPengumuman($id=null)
    {
        $session                = session();
        $pengumuman             = new Model_pengumuman();
        $log                    = new Model_log();
        $data                   = $pengumuman->where('idPengumuman',$id)->findAll();  
        $hapus                  = $pengumuman->delete($id);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penghapusan Pengumuman '.$data[0]['pengumuman'],
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);    
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "pengumuman berhasil di hapus"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminPengumuman');
    } 
}