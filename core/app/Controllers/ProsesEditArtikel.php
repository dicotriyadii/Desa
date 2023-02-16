<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_artikel;
use App\Models\Model_log;

class ProsesEditArtikel extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $artikel             = new Model_artikel();
        $data                = $artikel->getArtikel();
        $log                 = new Model_log();
        $idArtikel           = $this->request->getPost('idArtikel');
        $file                = $this->request->getFile('file');
        if(!$file ->isValid()){
            $data = [
                'judulArtikel'      => $this->request->getPost('judulArtikel'),
                'authorArtikel'     => $session->get('nama'),
                'keterangan'        => $this->request->getPost('keterangan'),
                'tanggalArtikel'    => date('Y-m-d'),
                'status'            => $this->request->getPost('status'),
            ];
            $artikel->update($idArtikel,$data);
        }else{
            $acak                = rand(10,500);
            $namaArtikel         = "artikel_".$this->request->getPost('judulArtikel')."_".$acak.".jpg";
            unlink('artikel/'.$data[0]['gambarArtikel']);   
            $file->move('artikel/', $namaArtikel);
            $data = [
                'judulArtikel'      => $this->request->getPost('judulArtikel'),
                'authorArtikel'     => $session->get('nama'),
                'gambarArtikel'     => $namaArtikel,
                'keterangan'        => $this->request->getPost('keterangan'),
                'tanggalArtikel'    => date('Y-m-d'),
                'status'            => $this->request->getPost('status'),
            ];
            $artikel->update($idArtikel,$data);
        }
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Artikel',
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Artikel berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminArtikel');
    }
 
}