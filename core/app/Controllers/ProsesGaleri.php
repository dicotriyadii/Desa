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
        // inisialisasi variable
        $session             = session();
        $galeri              = new Model_galeri_foto();
        $log                 = new Model_log();       
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');   
        $jenisGaleri         = $this->request->getPost('jenis');
        $judulGaleri         = $this->request->getPost('judul');
        $linkEmbed           = $this->request->getPost('video'); 
        $gambar              = $this->request->getFile('gambar');
        // validasi file
        $validationRule = [
            'gambar' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[gambar]',
                    'is_image[gambar]',
                    'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[gambar,5120]',
                ],
            ],
        ];
        if (! $this->validate($validationRule)) {
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => "Mohon maaf, untuk upload gambar, maximal size gambar 5 mb dengan tipe data jpg/jpeg"
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'/adminGaleri');    
        }
        // proses
        $cekGambarGaleri     = $galeri->where('judul',$judulGaleri)->findAll();
        if($cekGambarGaleri != null){
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => "Galeri sudah tersimpan"
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'/adminGaleri');    
        }
        if(!$gambar ->isValid()){
            // Proses Galeri Video
            $data = [
                'kodeKecamatan' => $kodeKecamatanLog,
                'kodeDesa'      => $kodeDesaLog,
                'judul'         => $judulGaleri,
                'jenis'         => $jenisGaleri,
                'status'        => 'Belum Validasi',
                'link'          => $linkEmbed,
            ];
            $galeri->insert($data);
        }else{
            // Proses galeri foto
            $acak       = rand(10,500);
            $namaFoto   = "galeri_".$acak.".jpg";
            $gambar->move('galeri/', $namaFoto);
            $data = [
                'kodeKecamatan' => $kodeKecamatanLog,
                'kodeDesa'      => $kodeDesaLog,
                'judul'         => $judulGaleri,
                'jenis'         => $jenisGaleri,
                'status'        => 'Belum Validasi',         
                'link'          => $namaFoto
            ];
            $galeri->insert($data);
        }
        //Log
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'menambah galeri '.$judulGaleri,
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Gambar berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminGaleri');
    }

    public function hapusGaleri($id=null)
    {
        $session                = session();
        $Galeri                 = new Model_galeri_foto();
        $log                    = new Model_log();
        $kodeKecamatanLog       = $session->get('kodeKecamatan');
        $kodeDesaLog            = $session->get('kodeDesa');
        $usernameLog            = $session->get('nama');   
        $data                   = $Galeri->where('idGaleri',$id)->findAll();  
        $hapus                  = $Galeri->delete($id);
        if($data[0]['jenis'] != "video"){
            unlink('galeri/'.$data[0]['link']);    
        }
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penghapusan data Galeri '.$data[0]['judul'],
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Gambar berhasil di hapus"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminGaleri');
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
            'keterangan'    => 'Perubahan Status Galeri '.$data[0]['judul'],
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Status Galeri berhasil di rubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminGaleri');
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
            'keterangan'    => 'Perubahan Status Galeri '.$data[0]['judul'],
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Status Galeri berhasil di rubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminGaleri');
    }
 
}