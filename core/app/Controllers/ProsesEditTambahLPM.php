<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_struktur_lpm;
use App\Models\Model_log;

class ProsesEditTambahLPM extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session            = session();
        $anggotaLPM         = new Model_struktur_lpm();
        $log                = new Model_log();
        $kodeKecamatanLog   = $session->get('kodeKecamatan');
        $kodeDesaLog        = $session->get('kodeDesa');
        $usernameLog        = $session->get('nama');
        $gambar             = $this->request->getFile('gambar');
        $jabatan            = $this->request->getPost('jabatan');
        $nik                = $this->request->getPost('nik');
        $idAnggota          = $this->request->getPost('idAnggotaLPM');
        if(!$gambar ->isValid()){
            $data = [
                'nik'       => $nik,
                'jabatan'   => $jabatan,
            ];
            $anggotaLPM->update($idAnggota,$data);
        }else{ 
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
                return redirect()->to(base_url().'/adminLPM');    
            }
            $data           = $anggotaLPM->where('nik',$nik)->findAll();
            $acak           = rand(10,500);
            $namaGambar     = "anggotaLPM_".$nik."_".$acak.".jpg";
            unlink('foto/'.$data[0]['gambar']);   
            $gambar->move('foto/', $namaGambar);
            $data = [
                'nik'       => $nik,
                'jabatan'   => $jabatan,
                'gambar'    => $namaGambar,
            ];
            $anggotaLPM->update($idAnggota,$data);
        }
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Anggota LPM ' . $nik,
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Perubahan Pengguna berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminLPM');
    }
 
}