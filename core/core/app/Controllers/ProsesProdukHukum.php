<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_produk_hukum;
use App\Models\Model_log;

class ProsesProdukHukum extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $produkHukum         = new Model_produk_hukum();
        $log                 = new Model_log();        
        $file                = $this->request->getFile('file');
        $namaProdukHukum     = "produkHukum_".$this->request->getPost('produkHukum').'.pdf';
        $cekBerkas           = $produkHukum->where('berkasProdukHukum',$namaProdukHukum)->findAll();
        if($cekBerkas != null){
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => "Gambar / Berkas sudah tersimpan"
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'/formProdukHukum');
        }
        $file->move('produkHukum/', $namaProdukHukum);
        $data = [
            'namaProdukHukum'   => $this->request->getPost('produkHukum'),
            'berkasProdukHukum' => $namaProdukHukum,
            'keterangan'        => $this->request->getPost('keterangan'),
            'authorProdukHukum' => $session->get('nama'),
            'tanggalUpload'     => date('Y-m-d')
        ];
        $produkHukum->insert($data);
        //Log
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'menambah Produk Hukum '. $this->request->getPost('produkHukum'),
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Produk Hukum berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/formProdukHukum');
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