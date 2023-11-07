<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_struktur_bpd;
use App\Models\Model_log;

class ProsesEditTambahBPD extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session            = session();
        $anggotaBPD         = new Model_struktur_bpd();
        $kodeKecamatanLog   = $session->get('kodeKecamatan');
        $kodeDesaLog        = $session->get('kodeDesa');
        $usernameLog        = $session->get('nama');
        $log                = new Model_log();
        $gambar             = $this->request->getFile('gambar');
        $jabatan            = $this->request->getPost('jabatan');
        $nik                = $this->request->getPost('nik');
        $idAnggota          = $this->request->getPost('idAnggotaBPD');
        $acak               = rand(10,500);
        if(!$gambar->isValid()){
            $data = [
                'nik'       => $nik,
                'jabatan'   => $jabatan,
            ];
            $anggotaBPD->update($idAnggota,$data);
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
                return redirect()->to(base_url().'/adminBPD');    
            }
            $dataAnggota           = $anggotaBPD->where('nik',$nik)->findAll();
            $namaGambar     = "PKK_".$nik."_".$acak.".jpg";
            unlink('foto/'.$dataAnggota[0]['gambar']);   
            $gambar->move('foto/', $namaGambar);
            $data = [
                'nik'       => $nik,
                'jabatan'   => $jabatan,
                'gambar'    => $namaGambar,
            ];
        $anggotaBPD->update($idAnggota,$data);
        }
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Anggota BPD ' . $nik,
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan Pengguna berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminBPD');
    }
 
}