<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_kategori;
use App\Models\Model_log;

class ProsesTambahKategori extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session        = session();
        $kategori       = new Model_kategori();
        $log            = new Model_log();
        $data = [
            'jenisKategori'        => $this->request->getPost('kategori'),
        ];
        $kategori->insert($data);
        
        //Log
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'menambah Kategori dengan jenis kategori '. $this->request->getPost('kategori'),
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Kategori berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminKategori');
    }

    public function hapusKategori($id=null)
    {
        $session        = session();
        $kategori       = new Model_kategori();
        $log            = new Model_log();
        $data           = $kategori->where('idKategori',$id)->findAll();  
        $hapus          = $kategori->delete($id);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penghapusan kategori '.$data[0]['jenisKategori'],
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);   
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Kategori berhasil di hapus"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminKategori');
    }
 
}