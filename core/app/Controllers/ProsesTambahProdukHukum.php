<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_produk_hukum;
use App\Models\Model_log;

class ProsesTambahProdukHukum extends ResourceController
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
        $file                = $this->request->getFile('file');
        $judulProdukHukum    = $this->request->getPost('judulProdukHukum');
        $namaProdukHukum     = "produkHukum_".$judulProdukHukum.'.pdf';
        $cekBerkas           = $produkHukum->where('berkasProdukHukum',$namaProdukHukum)->findAll();
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
        if($cekBerkas != null){
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => "Gambar / Berkas sudah tersimpan"
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'/adminProdukHukum');
        }
        $periksaBerkas = $this->validate([
            'file' => [
            'uploaded[file]',
            'mime_in[file,application/pdf]',
            'max_size[file,210]',
            ],
        ]);
        if($periksaBerkas != true){
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => "Berkas tidak sesuai dengan format yang di tentukan, silahkan coba lagi"
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'/adminProdukHukum');   
        } 
        $file->move('produkHukum/', $namaProdukHukum);
        $data = [
            'kodeKecamatan'     => $kodeKecamatanLog,
            'kodeDesa'          => $kodeDesaLog,
            'namaProdukHukum'   => $judulProdukHukum,
            'berkasProdukHukum' => $namaProdukHukum,
            'authorProdukHukum' => $usernameLog,
            'tanggalUpload'     => date('Y-m-d')
        ];
        $produkHukum->insert($data);
        //Log
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'menambah Produk Hukum '. $judulProdukHukum,
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Produk Hukum berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminProdukHukum');
    }

    public function hapusProdukHukum($id=null)
    {
        $session                = session();
        $produkHukum            = new Model_produk_hukum();
        $log                    = new Model_log();
        $data                   = $produkHukum->where('idProdukHukum',$id)->findAll();  
        $hapus                  = $produkHukum->delete($id);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penghapusan data Produk Hukum '.$data[0]['namaProdukHukum'],
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        unlink('produkHukum/'.$data[0]['berkasProdukHukum']);    
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Produk Hukum berhasil di hapus"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminProdukHukum');
    }
 
}