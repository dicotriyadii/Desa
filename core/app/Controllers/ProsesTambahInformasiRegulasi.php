<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_informasi_regulasi;
use App\Models\Model_log;

class ProsesTambahInformasiRegulasi extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $informasiRegulasi   = new Model_informasi_regulasi();
        $log                 = new Model_log();        
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');    
        $file                = $this->request->getFile('file');
        $judulRegulasi       = $this->request->getPost('judulRegulasi');
        $angkaAcak           = rand(1,10000);
        $namaRegulasi        = "produkHukum_".$judulRegulasi.'_'.$angkaAcak.'.pdf';
        $cekBerkas           = $informasiRegulasi->where('berkas',$namaRegulasi)->findAll();
        // validasi file
        $validationRule = [
            'file' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[file]',
                    'mime_in[file,application/pdf]',
                    'max_size[file,5120]',
                ],
            ],
        ];
        if (! $this->validate($validationRule)) {
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => "Mohon maaf, untuk upload gambar, maximal size gambar 5 mb dengan tipe data pdf"
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'/adminInformasiRegulasi');    
        }
        if($cekBerkas != null){
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => "Gambar / Berkas sudah tersimpan"
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'/adminInformasiRegulasi');
        }
        $periksaBerkas = $this->validate([
            'file' => [
            'uploaded[file]',
            'mime_in[file,application/pdf]',
            'max_size[file,210]',
            ],
        ]);
        if($periksaBerkas != true){
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => "Berkas tidak sesuai dengan format yang di tentukan, silahkan coba lagi"
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'/adminInformasiRegulasi');   
        } 
        $file->move('regulasi/', $namaRegulasi);
        $data = [
            'kodeKecamatan'     => $kodeKecamatanLog,
            'kodeDesa'          => $kodeDesaLog,
            'judulRegulasi'     => $judulRegulasi,
            'berkas'            => $namaRegulasi,
        ];
        $informasiRegulasi->insert($data);
        //Log
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'menambah Regulasi '. $judulRegulasi,
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Regulasi berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminInformasiRegulasi');
    }

    public function hapusRegulasi($id=null)
    {
        $session                = session();
        $informasiRegulasi      = new Model_informasi_regulasi();
        $log                    = new Model_log();
        $data                   = $informasiRegulasi->where('idRegulasi',$id)->findAll();  
        $hapus                  = $informasiRegulasi->delete($id);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penghapusan data Produk Hukum '.$data[0]['judulRegulasi'],
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        unlink('regulasi/'.$data[0]['berkas']);    
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Regulasi berhasil di hapus"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminInformasiRegulasi');
    }
 
}