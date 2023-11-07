<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_informasi_publik;
use App\Models\Model_log;

class ProsesTambahInformasiPublik extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session                = session();
        $informasiPublik        = new Model_informasi_publik();
        $log                    = new Model_log();        
        $kodeKecamatanLog       = $session->get('kodeKecamatan');
        $kodeDesaLog            = $session->get('kodeDesa');
        $usernameLog            = $session->get('nama');    
        $file                   = $this->request->getFile('file');
        $judulInformasiPublik   = $this->request->getPost('judulInformasiPublik');
        $namaInformasiPublik    = "informasiPublik_".$judulInformasiPublik.'.pdf';
        $cekBerkas              = $informasiPublik->where('berkasInformasiPublik',$namaInformasiPublik)->findAll();
        // validasi file
        $validationRule = [
            'file' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[file]',
                    'is_image[file]',
                    'mime_in[file,application/pdf]',
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
            return redirect()->to(base_url().'/adminInformasiPublik');    
        }
        if($cekBerkas != null){
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => "Gambar / Berkas sudah tersimpan"
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'/adminInformasiPublik');
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
            return redirect()->to(base_url().'/adminInformasiPublik');   
        }
        $file->move('informasiPublik/', $namaInformasiPublik);
        $data = [
            'kodeKecamatan'         => $kodeKecamatanLog,
            'kodeDesa'              => $kodeDesaLog,
            'namaInformasiPublik'   => $judulInformasiPublik,
            'berkasInformasiPublik' => $namaInformasiPublik,
            'authorInformasiPublik' => $usernameLog,
            'tanggalUpload'         => date('Y-m-d')
        ];
        $informasiPublik->insert($data);
        //Log
        $dataLog = [

            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'menambah informasi publik '. $judulInformasiPublik,
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Informasi Publik berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminInformasiPublik');
    }

    public function hapusInformasiPublik($id=null)
    {
        $session                = session();
        $informasiPublik        = new Model_informasi_publik();
        $log                    = new Model_log();
        $data                   = $informasiPublik->where('idInformasiPublik',$id)->findAll();  
        $hapus                  = $informasiPublik->delete($id);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penghapusan data informasi Publik '.$data[0]['namaInformasiPublik'],
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        unlink('informasiPublik/'.$data[0]['berkasInformasiPublik']);    
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Informasi Publik berhasil di hapus"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminInformasiPublik');
    }
 
}