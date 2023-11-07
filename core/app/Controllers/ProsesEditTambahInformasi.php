<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_informasi;
use App\Models\Model_log;

class ProsesEditTambahInformasi extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $informasi           = new Model_informasi();
        $log                 = new Model_log();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');    
        $idInformasi         = $this->request->getPost('idInformasi');
        $file                = $this->request->getFile('file');
        $jenisInformasi     = $this->request->getPost('jenisInformasi');
        $isiInformasi       = $this->request->getPost('isiInformasi');
        $penguasaInformasi  = $this->request->getPost('penguasaInformasi');
        $penanggungJawab    = $this->request->getPost('penanggungJawab');
        $tempat             = $this->request->getPost('tempat');
        $retensi            = $this->request->getPost('retensi');
        if(!$file ->isValid()){
            $data = [
                'jenisInformasi'    => $jenisInformasi,
                'isiInformasi'      => $isiInformasi,
                'penguasaInformasi' => $penguasaInformasi,
                'penanggungJawab'   => $penanggungJawab,
                'tempat'            => $tempat,
                'retensi'           => $retensi,
            ];
            $informasi->update($idInformasi,$data);
        }else{
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
                    'keterangan'    => "Mohon maaf, untuk upload gambar, maximal size gambar 5 mb dengan tipe data jpg/jpeg"
                ];
                $session->set($ses_data);
                return redirect()->to(base_url().'/adminInformasi');    
            }
            $data           = $informasi->where('idInformasi',$idInformasi)->findAll();
            $angkaAcak      = rand(1,10000);
            $namaInformasi  = "informasi_".$angkaAcak.".pdf";
            unlink('informasi/'.$data[0]['berkas']);   
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
            $informasi->update($idInformasi,$data);
        }
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Informasi',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan Informasi berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminInformasi');
    }
 
}