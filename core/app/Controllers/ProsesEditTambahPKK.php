<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_strukturPKK;
use App\Models\Model_log;
use App\Models\Model_userDasawisma;

class ProsesEditTambahPKK extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session            = session();
        $anggotaPKK         = new Model_strukturPKK();
        $log                = new Model_log();
        $dasawisma          = new Model_userDasawisma();
        $kodeKecamatanLog   = $session->get('kodeKecamatan');
        $kodeDesaLog        = $session->get('kodeDesa');
        $usernameLog        = $session->get('nama');
        $idAnggota          = $this->request->getPost('idAnggotaPKK');
        $gambar             = $this->request->getFile('gambar');
        $jabatan            = $this->request->getPost('jabatan');
        $nik                = $this->request->getPost('nik');
        $kodeDasawisma      = $this->request->getPost('kodeDasawisma');
        $acak               = rand(10,500);
        if(!$gambar ->isValid()){
            $data = [
                'nik'       => $this->request->getPost('nik'),
                'jabatan'   => $this->request->getPost('jabatan'),
            ];
            $anggotaPKK->update($idAnggota,$data);
            if($jabatan == "dasawisma"){
                $cekDasawisma = $dasawisma->where('nik',$nik)->findAll();
                $data = [
                    "idDasawisma" => $kodeDasawisma
                ];
            }
            $dasawisma->update($cekDasawisma[0]['idUserDasawisma'],$data);
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
                return redirect()->to(base_url().'/adminPKK');    
            }
            $data       = $anggotaPKK->where('nik',$nik)->findAll();
            $namaGambar = "PKK_".$nik."_".$acak.".jpg";
            unlink('foto/'.$data[0]['gambar']);   
            $gambar->move('foto/', $namaGambar);
            $data = [
                'nik'       => $this->request->getPost('nik'),
                'jabatan'   => $this->request->getPost('jabatan'),
                'gambar'    => $namaGambar,
            ];
            $anggotaPKK->update($idAnggota,$data);
            if($jabatan == "dasawisma"){
                $cekDasawisma = $dasawisma->where('nik',$nik)->findAll();
                $data = [
                    "idDasawisma" => $kodeDasawisma
                ];
            }
            $dasawisma->update($cekDasawisma[0]['idUserDasawisma'],$data);
        }
        
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Anggota PKK ' . $nik,
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Perubahan Pengguna berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminPKK');
    }
 
}