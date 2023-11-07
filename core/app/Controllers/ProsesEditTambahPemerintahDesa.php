<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_struktur_pemerintah_desa;
use App\Models\Model_log;

class ProsesEditTambahPemerintahDesa extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session            = session();
        $pengguna           = new Model_struktur_pemerintah_desa();
        $log                = new Model_log();
        $kodeKecamatanLog   = $session->get('kodeKecamatan');
        $kodeDesaLog        = $session->get('kodeDesa');
        $usernameLog        = $session->get('nama');
        $idUser             = $this->request->getPost('idAnggotaPemerintah');
        $gambar             = $this->request->getFile('gambar');
        $jabatan            = $this->request->getPost('jabatan');
        $nik                = $this->request->getPost('nik');
        $keterangan         = $this->request->getPost('keterangan');
        $acak               = rand(10,500);
        if(!$gambar ->isValid()){
            $data = [
                'nik'       => $nik,
                'jabatan'   => $jabatan,
                'keterangan' => $keterangan
            ];
            $pengguna->update($idUser,$data);        
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
                return redirect()->to(base_url().'/adminPemerintahDesa');    
            }
            $data           = $pengguna->where('nik',$nik)->findAll();
            $namaFoto       = "Pemerintah_".$nik."_".$acak.".jpg";
            // unlink('foto/'.$data[0]['gambar']);   
            $gambar->move('foto/', $namaFoto);
            $data = [
                'nik'           => $nik,
                'jabatan'       => $jabatan,
                'gambar'        => $namaFoto,
                'keterangan'    => $keterangan
            ];
            $pengguna->update($idUser,$data);
        }

        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Anggota Pemerintah ' . $nik,
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Perubahan data pemerintah desa berhasil"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminPemerintahDesa');
    }
 
}