<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_data;
use App\Models\Model_pemilik_tanah; 
use App\Models\Model_log;

class ProsesTambahPemilikTanah extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $modelData           = new Model_data();
        $modelPemilikTanah   = new Model_pemilik_tanah();
        $log                 = new Model_log();    
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');    
        $berkas              = $this->request->getFile('berkas');
        $nomorSurat          = $this->request->getPost('nomorSurat');
        $tanggalSurat        = $this->request->getPost('tanggalSurat');
        $pemilikSebelumnya   = $this->request->getPost('namaPemilikSebelumnya');
        $pemilikSekarang     = $this->request->getPost('namaPemilikSekarang');
        $luasTanah           = $this->request->getPost('luasTanah');
        $alamat              = $this->request->getPost('alamat');
        $acak                = rand(10,500);
        $namaBerkas          = "suratTanah_".$acak.".pdf";
        $cekBerkas           = $modelData->cekKepemilikanSurat($nomorSurat);
        // validasi file
        $validationRule = [
            'berkas' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[berkas]',
                    'is_image[berkas]',
                    'mime_in[berkas,application/pdf]',
                    'max_size[berkas,5120]',
                ],
            ],
        ];
        if (! $this->validate($validationRule)) {
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => "Mohon maaf, untuk upload gambar, maximal size gambar 5 mb dengan tipe data jpg/jpeg"
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'/informasiKepemilikanTanah');    
        }
        if($cekBerkas != null){
            //Log
            $dataLog = [
                'kodeKecamatan' => $kodeKecamatanLog,
                'kodeDesa'      => $kodeDesaLog,
                'nama'          => $usernameLog,
                'waktu'         => date('Y-m-d H:i:s'),
                'keterangan'    => 'Berkas sudah tersimpan di database dengan nomor surat '. $nomnorSurat,
            ];
            $log->insert($dataLog);
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => "Berkas sudah ada di database"
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'/informasiKepemilikanTanah');    
        }
        $berkas->move('suratTanah/', $namaBerkas);
        $data = [
            'kodeKecamatan'     => $kodeKecamatanLog,
            'kodeDesa'          => $kodeDesaLog,
            'nomorSurat'        => $nomorSurat,
            'tanggalSurat'      => $tanggalSurat,
            'pemilikSebelumnya' => $pemilikSebelumnya,
            'pemilikSekarang'   => $pemilikSekarang,
            'luasTanah'         => $luasTanah,
            'alamat'            => $alamat,
            'berkas'            => $namaBerkas
        ];
        $modelPemilikTanah->insert($data);
        //Log
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Menambah Kepemilikan Tanah dengan nomor surat '. $nomorSurat,
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Kepemilikan tanah berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminKepemilikanTanah');
    }

    public function hapusPemilikTanah($id=null)
    {
        $session                = session();
        $modelPemilikTanah      = new Model_pemilik_tanah();
        $log                    = new Model_log();
        $kodeKecamatanLog       = $session->get('kodeKecamatan');
        $kodeDesaLog            = $session->get('kodeDesa');
        $usernameLog            = $session->get('nama');   
        $data                   = $modelPemilikTanah->where('idPemilikTanah',$id)->findAll();  
        $hapus                  = $modelPemilikTanah->delete($id);
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penghapusan data kepemilikan tanah dengan nomor surat '.$data[0]['nomorSurat'],
        ];
        $log->insert($dataLog);
        unlink('suratTanah/'.$data[0]['berkas']);    
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Kepemilikan Tanah berhasil di hapus"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminKepemilikanTanah');
    }
}