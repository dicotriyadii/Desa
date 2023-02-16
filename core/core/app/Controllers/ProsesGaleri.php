<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_galeri_foto;
use App\Models\Model_log;

class ProsesGaleri extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $galeri              = new Model_galeri_foto();
        $log                 = new Model_log();        
        $file                = $this->request->getFile('file');
        $namaGaleri          = "galeri_".$this->request->getPost('judulGambar').".jpg";
        $cekGambarGaleri     = $galeri->where('gambar',$namaGaleri)->findAll();
        if($cekGambarGaleri != null){
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => "Gambar / Berkas sudah disimpan"
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'/formGaleri');    
        }
        $file->move('galeri/', $namaGaleri);
        $data = [
            'namaGambar'    => $this->request->getPost('judulGambar'),
            'gambar'        => $namaGaleri,
            'keterangan'    => $this->request->getPost('keterangan'),
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
            'keterangan'    => "Gambar berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/formGaleri');
    }

    public function hapusGaleri($id=null)
    {
        $session                = session();
        $Galeri                 = new Model_galeri_foto();
        $log                    = new Model_log();
        $data                   = $Galeri->where('idGaleri',$id)->findAll();  
        $hapus                  = $Galeri->delete($id);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penghapusan data Galeri '.$data[0]['namaGambar'],
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        unlink('galeri/'.$data[0]['gambar']);    
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Artikel berhasil di hapus"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminGaleriFoto');
    }

    public function belumValidasi($id=null)
    {
        $session                = session();
        $galeri                 = new Model_galeri_foto();
        $log                    = new Model_log();  
        $data                   = $galeri->where('idGaleri',$id)->findAll();
        $dataArray= [
            'status' => 'Belum Validasi'
        ];
        $galeri->update($id,$dataArray);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Perubahan Status Galeri '.$data[0]['namaGambar'],
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Status Galeri berhasil di rubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminGaleriFoto');
    }
    public function sudahValidasi($id=null)
    {
        $session                = session();
        $galeri                 = new Model_galeri_foto();
        $log                    = new Model_log();  
        $data                   = $galeri->where('idGaleri',$id)->findAll();
        $dataArray= [
            'status' => 'Sudah Validasi'
        ];
        $galeri->update($id,$dataArray);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Perubahan Status Galeri '.$data[0]['namaGambar'],
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Status Galeri berhasil di rubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminGaleriFoto');
    }
 
}