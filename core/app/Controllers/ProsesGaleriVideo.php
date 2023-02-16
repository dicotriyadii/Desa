<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_galeri_foto;
use App\Models\Model_log;

class ProsesGaleriVideo extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $galeri              = new Model_galeri_foto();
        $log                 = new Model_log();        
        $data = [
            'namaGambar'    => $this->request->getPost('judul'),
            'gambar'        => "video",
            'keterangan'    => $this->request->getPost('video'),
            'posted'        => $session->get('nama'),
            'tanggalArtikel'=> date('Y-m-d'),
            'status'        => 'Belum Validasi'
        ];
        $galeri->insert($data);
        //Log
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'menambah galeri '. $this->request->getPost('judulGambar'),
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "video berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/formGaleri');
    }
}