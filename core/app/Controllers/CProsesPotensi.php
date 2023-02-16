<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_potensi;
use App\Models\Model_log;

class CProsesPotensi extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $potensi             = new Model_potensi();
        $log                 = new Model_log();        
        $gambar              = $this->request->getFile('gambar');
        $namaGambarPotensi   = "potensi_".$rand = rand(10, 50).'.jpg';
        $cekBerkas           = $potensi->where('gambar',$namaGambarPotensi)->findAll();
        if($cekBerkas != null){
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => "Gambar sudah tersimpan, silahkan coba lagi dengan nama gambar yang berbeda"
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'/adminPotensiDesa');
        }
        $gambar->move('potensi/',$namaGambarPotensi);
        $data = [
            'jenisPotensi'  => $this->request->getPost('jenisPotensi'),
            'namaPotensi'   => $this->request->getPost('namaPotensi'),
            'alamatPotensi'        => $this->request->getPost('alamat'),
            'helpdesk'      => $this->request->getPost('helpdesk'),
            'gambar'        => $namaGambarPotensi,
        ];
        $potensi->insert($data);
        //Log
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Menambah Potensi '. $this->request->getPost('namaPotensi'),
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Berita berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminPotensiDesa');
    }

    public function hapusPotensi($id=null)
    {
        $session                = session();
        $potensi                = new Model_potensi();
        $log                    = new Model_log();
        $data                   = $potensi->where('idPotensi',$id)->findAll();  
        $hapus                  = $potensi->delete($id);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penghapusan Potensi Desa '.$data[0]['namaPotensi'],
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        unlink('potensi/'.$data[0]['gambar']);    
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Potensi Desa berhasil di hapus"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminPotensiDesa');
    }
}