<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_sejarah_desa;
use App\Models\Model_log;

class ProsesTambahSejarah extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session          = session();
        $sejarah          = new Model_sejarah_desa();
        $log              = new Model_log(); 
        $kodeKecamatanLog = $session->get('kodeKecamatan');
        $kodeDesaLog      = $session->get('kodeDesa');
        $usernameLog      = $session->get('nama');           
        $isiSejarah       = $this->request->getPost('sejarah');
        $gambar           = $this->request->getFile('gambar');
        $acak             = rand(10,500);
        $namaFoto         = "sejarah_".$acak.".jpg";
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
        $gambar->move('assets/', $namaFoto);
        $data = [
            'kodeKecamatan'         => $kodeKecamatanLog,
            'kodeDesa'              => $kodeDesaLog,
            'keteranganSejarahDesa' => $isiSejarah,
            'gambar'                => $namaFoto
        ];
        $sejarah->insert($data);
        //Log
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penambahan Sejarah',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Sejarah Desa berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminSejarahDesa');
    } 
}