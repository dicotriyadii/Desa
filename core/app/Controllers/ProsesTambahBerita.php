<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_berita;
use App\Models\Model_log;

class ProsesTambahBerita extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session                = session();
        $berita                 = new Model_berita();
        $log                    = new Model_log();        
        $kodeKecamatanLog       = $session->get('kodeKecamatan');
        $kodeDesaLog            = $session->get('kodeDesa');
        $usernameLog            = $session->get('nama');   
        $file                   = $this->request->getFile('file');
        $judulBerita            = $this->request->getPost('judulBerita');
        $keterangan             = $this->request->getPost('keterangan');
        $kategori               = $this->request->getPost('kategori');

        $acak                = rand(10,500);
        $namaBerita          = "berita_".$acak.".jpg";
        $cekBerkas           = $berita->where('gambarBerita',$namaBerita)->findAll();
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


        if($cekBerkas != null){
            //Log
            $dataLog = [
                'kodeKecamatan' => $kodeKecamatanLog,
                'kodeDesa'      => $kodeDesaLog,
                'nama'          => $usernameLog,
                'waktu'         => date('Y-m-d H:i:s'),
                'keterangan'    => 'menambah berita '.$judulBerita,
            ];
            $log->insert($dataLog);
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => "Gambar / Berkas Sudah tersimpan"
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'/adminBerita');
        }
        $file->move('berita/', $namaBerita);
        $data = [
            'kodeKecamatan'    => $kodeKecamatanLog,
            'kodeDesa'         => $kodeDesaLog,
            'judulBerita'      => $judulBerita,
            'authorBerita'     => $usernameLog,
            'gambarBerita'     => $namaBerita,
            'keterangan'       => $keterangan,
            'tanggalBerita'    => date('Y-m-d'),
            'idKategori'       => $kategori,
            'status'           => 'Belum Validasi'
        ];
        $berita->insert($data);
        //Log
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'menambah berita '.$judulBerita,
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Berita berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminBerita');
    }

    public function hapusBerita($id=null)
    {
        $session                = session();
        $berita                 = new Model_berita();
        $log                    = new Model_log();
        $data                   = $berita->where('idBerita',$id)->findAll();  
        $hapus                  = $berita->delete($id);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penghapusan data Artikel '.$data[0]['judulBerita'],
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        unlink('berita/'.$data[0]['gambarBerita']);    
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Berita berhasil di hapus"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminBerita');
    }

    public function belumValidasi($id=null)
    {
        $session                = session();
        $berita                 = new Model_berita();
        $log                    = new Model_log();  
        $data                   = $berita->where('idBerita',$id)->findAll();
        $dataArray= [
            'status' => 'Belum Validasi'
        ];
        $berita->update($id,$dataArray);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Perubahan Status Artikel '.$data[0]['judulBerita'],
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Status Berita berhasil di rubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminBerita');
    }
    public function sudahValidasi($id=null)
    {
        $session                = session();
        $berita                 = new Model_berita();
        $log                    = new Model_log();  
        $data                   = $berita->where('idBerita',$id)->findAll();
        $dataArray= [
            'status' => 'Sudah Validasi'
        ];
        $berita->update($id,$dataArray);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Perubahan Status Artikel '.$data[0]['judulBerita'],
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Status Berita berhasil di rubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminBerita');
    }
 
}