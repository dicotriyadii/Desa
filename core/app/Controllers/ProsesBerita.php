<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_berita;
use App\Models\Model_log;

class ProsesBerita extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $berita              = new Model_berita();
        $log                 = new Model_log();        
        $file                = $this->request->getFile('file');
        $acak                = rand(10,500);
        $namaBerita          = "berita_".$acak.".jpg";
        $cekBerkas           = $berita->where('gambarBerita',$namaBerita)->findAll();
        if($cekBerkas != null){
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => "Gambar / Berkas Sudah tersimpan"
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'/formBerita');
        }
        $file->move('berita/', $namaBerita);
        $data = [
            'judulBerita'      => $this->request->getPost('judulBerita'),
            'authorBerita'     => $session->get('nama'),
            'gambarBerita'     => $namaBerita,
            'keterangan'       => $this->request->getPost('keterangan'),
            'tanggalBerita'    => date('Y-m-d'),
            'kategori'         => $this->request->getPost('kategori'),
            'status'           => 'Belum Validasi'
        ];
        $berita->insert($data);
        //Log
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'menambah berita '. $this->request->getPost('judulArtikel'),
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Berita berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/formBerita');
    }

    public function hapusBerita($id=null)
    {
        $session                = session();
        $berita                 = new Model_berita();
        $log                    = new Model_log();
        $data                   = $berita->where('idBerita',$id)->findAll();  
        $hapus                  = $berita->delete($id);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penghapusan data Artikel '.$data[0]['judulBerita'],
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        unlink('berita/'.$data[0]['gambarBerita']);    
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Berita berhasil di hapus"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminBerita');
    }

    public function belumValidasi($id=null)
    {
        $session                = session();
        $berita                 = new Model_berita();
        $log                    = new Model_log();  
        $data                   = $berita->where('idBerita',$id)->findAll();
        $dataArray= [
            'status' => 'Belum Validasi'
        ];
        $berita->update($id,$dataArray);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Perubahan Status Artikel '.$data[0]['judulBerita'],
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Status Berita berhasil di rubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminBerita');
    }
    public function sudahValidasi($id=null)
    {
        $session                = session();
        $berita                 = new Model_berita();
        $log                    = new Model_log();  
        $data                   = $berita->where('idBerita',$id)->findAll();
        $dataArray= [
            'status' => 'Sudah Validasi'
        ];
        $berita->update($id,$dataArray);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Perubahan Status Artikel '.$data[0]['judulBerita'],
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Status Berita berhasil di rubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminBerita');
    }
 
}