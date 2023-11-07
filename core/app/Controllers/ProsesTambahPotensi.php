<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_potensi;
use App\Models\Model_log;

class ProsesTambahPotensi extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $potensi             = new Model_potensi();
        $log                 = new Model_log();        
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');     
        $jenisPotensi        = $this->request->getPost('jenisPotensi');
        $namaPotensi         = $this->request->getPost('namaPotensi');
        $alamat              = $this->request->getPost('alamat');
        $helpdesk            = $this->request->getPost('helpdesk');
        $gambar              = $this->request->getFile('gambar');
        $namaGambarPotensi   = "potensi_".$rand = rand(10, 50).'.jpg';
        $cekBerkas           = $potensi->where('gambar',$namaGambarPotensi)->findAll();
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
            return redirect()->to(base_url().'/adminPotensiDesa');    
        }

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
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'jenisPotensi'  => $jenisPotensi,
            'namaPotensi'   => $namaPotensi,
            'alamatPotensi' => $alamat,
            'helpdesk'      => $helpdesk,
            'gambar'        => $namaGambarPotensi,
        ];
        $potensi->insert($data);
        //Log
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Menambah Potensi '. $namaPotensi,
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Potensi berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminPotensiUnggulan');
    }

    public function HapusPotensi($id=null)
    {
        $session                = session();
        $potensi                = new Model_potensi();
        $log                    = new Model_log();
        $kodeKecamatanLog       = $session->get('kodeKecamatan');
        $kodeDesaLog            = $session->get('kodeDesa');
        $usernameLog            = $session->get('nama');     
        $data                   = $potensi->where('idPotensi',$id)->findAll();  
        $hapus                  = $potensi->delete($id);
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penghapusan Potensi Desa '.$data[0]['namaPotensi'],
        ];
        $log->insert($dataLog);
        unlink('potensi/'.$data[0]['gambar']);    
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Potensi Desa berhasil di hapus"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminPotensiUnggulan');
    }
}