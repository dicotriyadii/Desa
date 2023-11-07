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
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');   
        $idGaleri            = $this->request->getPost('idGaleri');
        $jenisGaleri         = $this->request->getPost('jenis');
        $judulGaleri         = $this->request->getPost('judul');
        $linkEmbed           = $this->request->getPost('video');
        $gambar              = $this->request->getFile('gambar');
        $dataGaleri          = $galeri->where('idGaleri',$idGaleri)->findAll();
        // validasi file
        if($gambar ->isValid()){
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
        }

            // Proses galeri foto
            $acak       = rand(10,500);
            $namaFoto   = "galeri_".$acak.".jpg";
            $data = [
                'kodeKecamatan' => $kodeKecamatanLog,
                'kodeDesa'      => $kodeDesaLog,
                'judul'         => $judulGaleri,
                'jenis'         => $jenisGaleri,
                'status'        => 'Belum Validasi',         
                'link'          => $namaFoto
            ];
            $galeri->update($idGaleri,$data);
        if($dataGaleri[0]['jenis'] != 'video'){
            if($gambar ->isValid()){
                unlink('galeri/'.$dataGaleri[0]['link']); 
                $gambar->move('galeri/', $namaFoto);
            }
        }
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Galeri',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Galeri berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminGaleri');
    }
 
}