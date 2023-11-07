<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_potensi;
use App\Models\Model_log;

class ProsesEdittambahPotensi extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $potensi             = new Model_potensi();
        $log                 = new Model_log();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');   
        $idPotensi           = $this->request->getPost('idPotensi');
        $jenisPotensi        = $this->request->getPost('jenisPotensi');
        $namaPotensi         = $this->request->getPost('namaPotensi');
        $alamat              = $this->request->getPost('alamat');
        $helpdesk            = $this->request->getPost('helpdesk');
        $gambar              = $this->request->getFile('gambar');

        if(!$gambar ->isValid()){
            $data = [
                'kodeKecamatan' => $kodeKecamatanLog,
                'kodeDesa'      => $kodeDesaLog,
                'jenisPotensi'  => $jenisPotensi,
                'namaPotensi'   => $namaPotensi,
                'alamatPotensi' => $alamat,
                'helpdesk'      => $helpdesk,
            ];
            $potensi->update($idPotensi,$data);
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
                return redirect()->to(base_url().'/adminPotensiDesa');    
            }
            $dataPotensi         = $potensi->where('idPotensi',$idPotensi)->findAll();
            $namaGambarPotensi   = "potensi_".$rand = rand(10, 50).'.jpg';
            $cekBerkas           = $potensi->where('gambar',$namaGambarPotensi)->findAll();  
            $gambar->move('potensi/', $namaGambarPotensi);
            $data = [
                'kodeKecamatan' => $kodeKecamatanLog,
                'kodeDesa'      => $kodeDesaLog,
                'jenisPotensi'  => $jenisPotensi,
                'namaPotensi'   => $namaPotensi,
                'alamatPotensi' => $alamat,
                'helpdesk'      => $helpdesk,
                'gambar'        => $namaGambarPotensi,
            ];
            $potensi->update($idPotensi,$data);
        }
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Potensi',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Potensi Desa berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminPotensiUnggulan');
    }
 
}