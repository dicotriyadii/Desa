<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_sejarah_desa;
use App\Models\Model_log;

class ProsesEditTambahSejarah extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session            = session();
        $sejarahDesa        = new Model_sejarah_desa();
        $log                = new Model_log();
        $kodeKecamatanLog   = $session->get('kodeKecamatan');
        $kodeDesaLog        = $session->get('kodeDesa');
        $usernameLog        = $session->get('nama');     
        $idSejarahDesa      = $this->request->getPost('idSejarahDesa');
        $isiSejarah         = $this->request->getPost('sejarah');
        $gambar             = $this->request->getFile('gambar'); 
        if(!$gambar->isValid()){
            $data = [
                'keteranganSejarahDesa'  => $isiSejarah,
            ];    
        }else{
            // namaGambar
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
                return redirect()->to(base_url().'/adminSejarahDesa');    
            }
            $dataSejarah = $sejarahDesa->where('idSejarahDesa',$idSejarahDesa)->findAll();
            unlink('assets/'.$dataSejarah[0]['gambar']);  
            $acak               = rand(10,500);
            $namaFoto           = "sejarah_".$acak.".jpg";
            $gambar->move('assets/', $namaFoto);
            $data = [
                'keteranganSejarahDesa'  => $isiSejarah,
                'gambar'                 => $namaFoto
            ];
        }
        $sejarahDesa->update($idSejarahDesa,$data);
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Sejarah Desa',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Perubahan Sejarah Desa berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminSejarahDesa');
    }
 
}