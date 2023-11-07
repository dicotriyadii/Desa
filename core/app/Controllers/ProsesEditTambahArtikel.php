<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_artikel;
use App\Models\Model_data;
use App\Models\Model_log;

class ProsesEditTambahArtikel extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $artikel             = new Model_artikel();
        $modelData           = new Model_data();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');  
        $data                = $modelData->getArtikel();
        $log                 = new Model_log();
        $idArtikel           = $this->request->getPost('idArtikel');
        $file                = $this->request->getFile('file');
        $judulArtikel        = $this->request->getPost('judulArtikel');
        $keterangan          = $this->request->getPost('keterangan');

        if(!$file ->isValid()){
            $data = [
                'judulArtikel'      => $judulArtikel,
                'authorArtikel'     => $usernameLog,
                'keterangan'        => $keterangan,
                'tanggalArtikel'    => date('Y-m-d'),
            ];
            $artikel->update($idArtikel,$data);
        }else{
            // validasi file
            $validationRule = [
                'file' => [
                    'label' => 'Image File',
                    'rules' => [
                        'uploaded[file]',
                        'is_image[file]',
                        'mime_in[file,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                        'max_size[file,5120]',
                    ],
                ],
            ];
            if (! $this->validate($validationRule)) {
                $ses_data = [
                    'statusTambah'  => "Gagal",
                    'keterangan'    => "Mohon maaf, untuk upload gambar, maximal size gambar 5 mb dengan tipe data jpg/jpeg"
                ];
                $session->set($ses_data);
                return redirect()->to(base_url().'/adminArtikel');    
            }
            $acak                = rand(10,500);
            $namaArtikel         = "artikel_".$this->request->getPost('judulArtikel')."_".$acak.".jpg";
            unlink('artikel/'.$data[0]['gambarArtikel']);   
            $file->move('artikel/', $namaArtikel);
            $data = [
                'judulArtikel'      => $judulArtikel,
                'authorArtikel'     => $usernameLog,
                'gambarArtikel'     => $namaArtikel,
                'keterangan'        => $keterangan,
                'tanggalArtikel'    => date('Y-m-d'),
            ];
            $artikel->update($idArtikel,$data);
        }
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Artikel',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Artikel berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminArtikel');
    }
 
}