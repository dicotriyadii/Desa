<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_kategori;
use App\Models\Model_log;

class ProsesEditKategori extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session        = session();
        $kategori       = new Model_kategori();
        $log            = new Model_log();
        $idKategori       = $this->request->getPost('idKategori');
        $data = [
            'jenisKategori'  => $this->request->getPost('kategori'),
        ];
        $kategori->update($idKategori,$data);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah jenis kategori',
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan Jennis Kategori berhasil"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminKategori');
    }
 
}