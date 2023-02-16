<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_berita;
use App\Models\Model_log;

class ProsesEditBerita extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $berita              = new Model_berita();
        $data                = $berita->getBerita();
        $log                 = new Model_log();
        $idBerita            = $this->request->getPost('idBerita');
        $file                = $this->request->getFile('file');
        $namaBerita          = "berita_".$this->request->getPost('judulberita');
        unlink('berita/'.$data[0]['gambarBerita']);   
        $file->move('berita/', $namaBerita);
        $data = [
            'judulBerita'       => $this->request->getPost('judulBerita'),
            'authorBerita'      => $session->get('nama'),
            'gambarBerita'      => $namaBerita,
            'keterangan'        => $this->request->getPost('keterangan'),
            'tanggalBerita'    => date('Y-m-d')
        ];
        $berita->update($idBerita,$data);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Berita',
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Berita berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminBerita');
    }
 
}