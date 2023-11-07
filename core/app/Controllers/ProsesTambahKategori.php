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
        $session            = session();
        $kategori           = new Model_kategori();
        $log                = new Model_log();
        $kodeKecamatanLog   = $session->get('kodeKecamatan');
        $kodeDesaLog        = $session->get('kodeDesa');
        $usernameLog        = $session->get('nama');
        $dataKategori       = $this->request->getPost('jenisKategori');   
        $data = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'jenisKategori' => $dataKategori,
        ];
        $kategori->insert($data);
        //Log
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'menambah Kategori dengan jenis kategori '. $dataKategori,
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
        $session            = session();
        $kategori           = new Model_kategori();
        $log                = new Model_log();
        $kodeKecamatanLog   = $session->get('kodeKecamatan');
        $kodeDesaLog        = $session->get('kodeDesa');
        $usernameLog        = $session->get('nama');
        $data               = $kategori->where('idKategori',$id)->findAll();  
        $hapus              = $kategori->delete($id);
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penghapusan kategori '.$data[0]['jenisKategori'],
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