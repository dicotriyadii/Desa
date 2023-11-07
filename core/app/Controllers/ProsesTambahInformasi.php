<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_informasi;
use App\Models\Model_log;

class ProsesTambahInformasi extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session            = session();
        $informasi          = new Model_informasi();
        $log                = new Model_log();        
        $kodeKecamatanLog   = $session->get('kodeKecamatan');
        $kodeDesaLog        = $session->get('kodeDesa');
        $usernameLog        = $session->get('nama');    
        $file               = $this->request->getFile('file');
        $jenisInformasi     = $this->request->getPost('jenisInformasi');
        $isiInformasi       = $this->request->getPost('isiInformasi');
        $penguasaInformasi  = $this->request->getPost('penguasaInformasi');
        $penanggungJawab    = $this->request->getPost('penanggungJawab');
        $tempat             = $this->request->getPost('tempat');
        $retensi            = $this->request->getPost('retensi');
        $angkaAcak          = rand(1,10000);
        $namaInformasi      = "informasi_".$angkaAcak.".pdf";
        $cekBerkas          = $informasi->where('berkas',$namaInformasi)->findAll();
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
            return redirect()->to(base_url().'/adminInformasi');    
        }
        if($cekBerkas != null){
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => "Gambar / Berkas sudah tersimpan"
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'/adminInformasi');
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
            return redirect()->to(base_url().'/adminInformasi');   
        } 
        $file->move('informasi/', $namaInformasi);
        $data = [
            'kodeKecamatan'     => $kodeKecamatanLog,
            'kodeDesa'          => $kodeDesaLog,
            'jenisInformasi'    => $jenisInformasi,
            'isiInformasi'      => $isiInformasi,
            'penguasaInformasi' => $penguasaInformasi,
            'penanggungJawab'   => $penanggungJawab,
            'tempat'            => $tempat,
            'retensi'           => $retensi,
            'berkas'            => $namaInformasi,
        ];
        $informasi->insert($data);
        //Log
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'menambah informasi '. $isiInformasi,
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Informasi berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminInformasi');
    }

    public function hapusInformasi($id=null)
    {
        $session        = session();
        $informasi      = new Model_informasi();
        $log            = new Model_log();
        $data           = $informasi->where('idInformasi',$id)->findAll();  
        $hapus          = $informasi->delete($id);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penghapusan data informasi '.$data[0]['isiInformasi'],
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        unlink('informasi/'.$data[0]['berkas']);    
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Informasi berhasil di hapus"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminInformasi');
    }
 
}