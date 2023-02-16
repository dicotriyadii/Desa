<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_galeri_foto;
use App\Models\Model_log;

class ProsesEditGaleri extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $galeri              = new Model_galeri_foto();
        $log                 = new Model_log();
        $idGaleri            = $this->request->getPost('idGaleri');
        $file                = $this->request->getFile('file');
        $dataGaleri          = $galeri->where('idGaleri',$idGaleri)->findAll();
        $acak                = rand(10,500);
        $namaGaleri          = "galeri_".$acak.".jpg";
        if($dataGaleri[0]['gambar'] != 'video'){
            unlink('galeri/'.$dataGaleri[0]['gambar']);   
            $file->move('galeri/', $namaGaleri);
        }
        $data = [
            'namaGambar'    => $this->request->getPost('judulGambar'),
            'gambar'        => $namaGaleri,
            'keterangan'    => $this->request->getPost('keterangan'),
            'posted'        => $session->get('nama'),
            'tanggalArtikel'=> date('Y-m-d'),
        ];
        $galeri->update($idGaleri,$data);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Galeri',
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Galeri berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminGaleriFoto');
    }
 
}