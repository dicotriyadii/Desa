<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_informasi_regulasi;
use App\Models\Model_log;

class ProsesEditTambahInformasiRegulasi extends ResourceController
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
        $idInformasiRegulasi = $this->request->getPost('idInformasiRegulasi');
        $file                = $this->request->getFile('file');
        $judulRegulasi       = $this->request->getPost('judulRegulasi');
        if(!$file ->isValid()){
            $data = [
                'judulRegulasi'     => $judulRegulasi,
            ];
            $informasiRegulasi->update($idInformasiRegulasi,$data);
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
                return redirect()->to(base_url().'/adminInformasiRegulasi');    
            }
            $data           = $informasiRegulasi->where('idRegulasi',$idInformasiRegulasi)->findAll();
            $angkaAcak      = rand(1,10000);
            $namaRegulasi   = "regulasi_".$judulRegulasi.'_'.$angkaAcak.'.pdf';
            unlink('regulasi/'.$data[0]['berkas']);   
            $file->move('regulasi/', $namaRegulasi);
            $data = [
                'judulRegulasi'     => $judulRegulasi,
                'berkas'            => $namaRegulasi,
            ];
            $informasiRegulasi->update($idInformasiRegulasi,$data);
        }
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Regulasi',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan Regulasi berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminInformasiRegulasi');
    }
 
}