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

        if(!$file ->isValid()){
             $data = [
                'judulBerita'      => $this->request->getPost('judulBerita'),
                'authorBerita'     => $session->get('nama'),
                'keterangan'       => $this->request->getPost('keterangan'),
                'kategori'         => $this->request->getPost('kategori'),
                'tanggalBerita'    => date('Y-m-d')
            ];
            $berita->update($idBerita,$data);
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
                return redirect()->to(base_url().'/adminBerita');    
            }
            $acak                = rand(10,500);
            $namaBerita          = "berita_".$acak.".jpg";
            unlink('berita/'.$data[0]['gambarBerita']);   
            $file->move('berita/', $namaBerita);
            $data = [
                'judulBerita'       => $this->request->getPost('judulBerita'),
                'authorBerita'      => $session->get('nama'),
                'gambarBerita'      => $namaBerita,
                'keterangan'        => $this->request->getPost('keterangan'),
                'kategori'         => $this->request->getPost('kategori'),
                'tanggalBerita'    => date('Y-m-d')
            ];
            $berita->update($idBerita,$data);     
        }
        
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