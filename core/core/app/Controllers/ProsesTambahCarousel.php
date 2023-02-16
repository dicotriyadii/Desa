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
        $session        = session();
        $carousel       = new Model_carousel();
        $log            = new Model_log(); 
        $jumlahCarousel = $carousel->countAllResults();
        if($jumlahCarousel >= 5){
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => "Gambar Carousel sudah penuh"
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'/formCarousel');    
        }
        $gambar         = $this->request->getFile('file');
        $namaGambar     = str_replace(' ','_',$gambar->getName());
        
        $image = \Config\Services::image()
        ->withFile($gambar)
        ->resize(1280, 550, true, 'height')
        ->save(FCPATH .'/carousel/'. $namaGambar);

        // $gambar->move('carousel/', $namaGambar);
        $data = [
            'gambar'                 => $namaGambar
        ];
        $carousel->insert($data);
        //Log
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'menambah gambar carousel ',
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Gambar slide show berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/formCarousel');
    }

    public function hapusCarousel($id=null)
    {
        $session       = session();
        $carousel      = new Model_carousel();
        $log           = new Model_log();
        $data          = $carousel->where('idCarousel',$id)->findAll();  
        $hapus         = $carousel->delete($id);
        $dataLog = [
            'nama'          => $session->get('nama'),
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