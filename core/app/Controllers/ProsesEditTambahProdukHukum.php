<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_produk_hukum;
use App\Models\Model_log;

class ProsesEditTambahProdukHukum extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $produkHukum         = new Model_produk_hukum();
        $log                 = new Model_log();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');    
        $idProdukHukum       = $this->request->getPost('idProdukHukum');
        $file                = $this->request->getFile('file');
        $judulProdukHukum    = $this->request->getPost('judulProdukHukum');
        if(!$file ->isValid()){
            $data = [
                'kodeKecamatan'     => $kodeKecamatanLog,
                'kodeDesa'          => $kodeDesaLog,
                'namaProdukHukum'   => $judulProdukHukum,
                'authorProdukHukum' => $usernameLog,
                'tanggalUpload'     => date('Y-m-d')
            ];
            $produkHukum->update($idProdukHukum,$data);
        }else{
            // validasi file
            $validationRule = [
                'file' => [
                    'label' => 'Image File',
                    'rules' => [
                        'uploaded[file]',
                        'is_image[file]',
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
                return redirect()->to(base_url().'/adminProdukHukum');    
            }
            $data = $produkHukum->where('idProdukHukum',$idProdukHukum)->findAll();
            $namaProdukHukum     = "produkHukum_".$judulProdukHukum.'.pdf';
            unlink('produkHukum/'.$data[0]['berkasProdukHukum']);   
            $file->move('produkHukum/', $namaProdukHukum);
            $data = [
                'kodeKecamatan'     => $kodeKecamatanLog,
                'kodeDesa'          => $kodeDesaLog,
                'namaProdukHukum'   => $judulProdukHukum,
                'berkasProdukHukum' => $namaProdukHukum,
                'authorProdukHukum' => $usernameLog,
                'tanggalUpload'     => date('Y-m-d')
            ];
            $produkHukum->update($idProdukHukum,$data);
        }
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Produk Hukum',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan Produk Hukum berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminProdukHukum');
    }
 
}