<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_visiMisi;
use App\Models\Model_log;

class ProsesTambahVisiMisi extends ResourceController
{
    use ResponseTrait;
 
    public function create()
    {
        $session             = session();
        $visiMisi            = new Model_visiMisi();
        $log                 = new Model_log(); 
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');           
        $visi                = $this->request->getPost('visi');
        $misi                = $this->request->getPost('misi');
        $keterangan          = $this->request->getPost('keterangan');
        $gambar              = $this->request->getFile('gambar');
        $acak                = rand(10,500);
        $namaFoto            = "visiMisi_".$acak.".jpg";
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
            return redirect()->to(base_url().'/adminVisiMisi');    
        }
        $gambar->move('assets/', $namaFoto);
        $data = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'visi'          => $visi,
            'misi'          => $misi,
            'keterangan'    => $keterangan,
            'gambar'        => $namaFoto
        ];
        $visiMisi->insert($data);
        //Log
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penambahan Visi Misi',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Visi Misi berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminVisiMisi');
    } 
}