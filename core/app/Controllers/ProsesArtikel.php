<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_artikel;
use App\Models\Model_log;

class ProsesArtikel extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $artikel             = new Model_artikel();
        $log                 = new Model_log();        
        $file                = $this->request->getFile('file');
        $acak                = rand(10,500);
        $namaArtikel         = "artikel_".$acak.".jpg";
        $cekArtikel          = $artikel->where('gambarArtikel',$namaArtikel)->findAll();
        if($cekArtikel != null){
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => "Gambar / Berkas Sudah tersimpan"
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'/formArtikel');    
        }
        $file->move('artikel/', $namaArtikel);
        $data = [
            'judulArtikel'      => $this->request->getPost('judulArtikel'),
            'authorArtikel'     => $session->get('nama'),
            'gambarArtikel'     => $namaArtikel,
            'keterangan'        => $this->request->getPost('keterangan'),
            'tanggalArtikel'    => date('Y-m-d'),
            'status'            => 'Belum Validasi'
        ];
        $artikel->insert($data);
        //Log
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'menambah artikel '. $this->request->getPost('judulArtikel'),
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Artikel berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/formArtikel');
    }

    public function hapusArtikel($id=null)
    {
        $session                = session();
        $artikel                = new Model_artikel();
        $log                    = new Model_log();
        $data                   = $artikel->where('idArtikel',$id)->findAll();  
        $hapus                  = $artikel->delete($id);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penghapusan data Artikel '.$data[0]['judulArtikel'],
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        unlink('artikel/'.$data[0]['gambarArtikel']);    
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Artikel berhasil di hapus"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminArtikel');
    }

    public function belumValidasi($id=null)
    {
        $session                = session();
        $artikel                = new Model_artikel();
        $log                    = new Model_log();  
        $data                   = $artikel->where('idArtikel',$id)->findAll();
        $dataArray= [
            'status' => 'Belum Validasi'
        ];
        $artikel->update($id,$dataArray);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Perubahan Status Artikel '.$data[0]['judulArtikel'],
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Status Artikel berhasil di rubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminArtikel');
    }
    public function sudahValidasi($id=null)
    {
        $session                = session();
        $artikel                = new Model_artikel();
        $log                    = new Model_log();  
        $data                   = $artikel->where('idArtikel',$id)->findAll();
        $dataArray= [
            'status' => 'Sudah Validasi'
        ];
        $artikel->update($id,$dataArray);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Perubahan Status Artikel '.$data[0]['judulArtikel'],
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Status Artikel berhasil di rubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminArtikel');
    }
 
}