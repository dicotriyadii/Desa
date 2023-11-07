<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_carousel;
use App\Models\Model_log;

class ProsesTambahCarousel extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session                = session();
        $carousel               = new Model_carousel();
        $log                    = new Model_log(); 
        $kodeKecamatanLog       = $session->get('kodeKecamatan');
        $kodeDesaLog            = $session->get('kodeDesa');
        $usernameLog            = $session->get('nama');
        $gambar                 = $this->request->getFile('file');
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
            return redirect()->to(base_url().'/adminCarousel');    
        }
        $jumlahCarousel         = $carousel->countAllResults(); 
        if($jumlahCarousel >= 5){
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => "Gambar Carousel sudah penuh"
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'/adminCarousel');    
        }
        $acak           = rand(10,500);
        $namaGambar     = "carousel_".$acak.".jpg";        
        // $image = \Config\Services::image()
        // ->withFile($gambar)
        // ->resize(1280, 550, true, 'height')
        // ->save(FCPATH .'/carousel/'. $namaGambar);

        $gambar->move('carousel/', $namaGambar);
        $data = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog, 
            'gambar'        => $namaGambar
        ];
        $carousel->insert($data);
        //Log
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'menambah gambar carousel ',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Gambar slide show berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminCarousel');
    }

    public function hapusCarousel($id=null)
    {
        $session                = session();
        $carousel               = new Model_carousel();
        $log                    = new Model_log();
        $kodeKecamatanLog       = $session->get('kodeKecamatan');
        $kodeDesaLog            = $session->get('kodeDesa');
        $usernameLog            = $session->get('nama');
        $data                   = $carousel->where('idCarousel',$id)->findAll();  
        $hapus                  = $carousel->delete($id);
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penghapusan gambar carousel ',
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        unlink('carousel/'.$data[0]['gambar']);    
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Gambar slide Show berhasil di hapus"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminCarousel');
    }
 
}