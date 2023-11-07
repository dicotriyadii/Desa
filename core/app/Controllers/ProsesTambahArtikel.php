<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_artikel; 
use App\Models\Model_log;

class ProsesTambahArtikel extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $artikel             = new Model_artikel();
        $log                 = new Model_log();    
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');    
        $file                = $this->request->getFile('file');
        $judulArtikel        = $this->request->getPost('judulArtikel');
        $keterangan          = $this->request->getPost('keterangan');
        $acak                = rand(10,500);
        $namaArtikel         = "artikel_".$acak.".jpg";
        $cekArtikel          = $artikel->where('gambarArtikel',$namaArtikel)->findAll();

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


        if($cekArtikel != null){
            //Log
            $dataLog = [
                'kodeKecamatan' => $kodeKecamatanLog,
                'kodeDesa'      => $kodeDesaLog,
                'nama'          => $usernameLog,
                'waktu'         => date('Y-m-d H:i:s'),
                'keterangan'    => 'menambah artikel '. $this->request->getPost('judulArtikel'),
            ];
            $log->insert($dataLog);
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => "Gambar / Berkas Sudah tersimpan"
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'/adminArtikel');    
        }
        $file->move('artikel/', $namaArtikel);
        $data = [
            'kodeKecamatan'     => $kodeKecamatanLog,
            'kodeDesa'          => $kodeDesaLog,
            'judulArtikel'      => $judulArtikel,
            'authorArtikel'     => $session->get('nama'),
            'gambarArtikel'     => $namaArtikel,
            'keterangan'        => $keterangan,
            'tanggalArtikel'    => date('Y-m-d'),
            'status'            => 'Belum Validasi'
        ];
        $artikel->insert($data);
        //Log
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'menambah artikel '. $this->request->getPost('judulArtikel'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Artikel berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminArtikel');
    }

    public function hapusArtikel($id=null)
    {
        $session                = session();
        $artikel                = new Model_artikel();
        $log                    = new Model_log();
        $kodeKecamatanLog       = $session->get('kodeKecamatan');
        $kodeDesaLog            = $session->get('kodeDesa');
        $usernameLog            = $session->get('nama');   
        $data                   = $artikel->where('idArtikel',$id)->findAll();  
        $hapus                  = $artikel->delete($id);
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penghapusan data Artikel '.$data[0]['judulArtikel'],
        ];
        $log->insert($dataLog);
        unlink('artikel/'.$data[0]['gambarArtikel']);    
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Artikel berhasil di hapus"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminArtikel');
    }

    public function belumValidasi($id=null)
    {
        $session                = session();
        $artikel                = new Model_artikel();
        $log                    = new Model_log();  
        $kodeKecamatanLog       = $session->get('kodeKecamatan');
        $kodeDesaLog            = $session->get('kodeDesa');
        $usernameLog            = $session->get('nama');   
        $data                   = $artikel->where('idArtikel',$id)->findAll();
        $dataArray= [
            'status' => 'Belum Validasi'
        ];
        $artikel->update($id,$dataArray);
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Perubahan Status Artikel '.$data[0]['judulArtikel'],
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Status Artikel berhasil di rubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminArtikel');
    }
    public function sudahValidasi($id=null)
    {
        $session                = session();
        $artikel                = new Model_artikel();
        $log                    = new Model_log();  
        $kodeKecamatanLog       = $session->get('kodeKecamatan');
        $kodeDesaLog            = $session->get('kodeDesa');
        $usernameLog            = $session->get('nama');   
        $data                   = $artikel->where('idArtikel',$id)->findAll();
        $dataArray= [
            'status' => 'Sudah Validasi'
        ];
        $artikel->update($id,$dataArray);
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Perubahan Status Artikel '.$data[0]['judulArtikel'],
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Status Artikel berhasil di rubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminArtikel');
    }
 
}