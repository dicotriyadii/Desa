<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_produk_hukum;
use App\Models\Model_log;

class ProsesEditProdukHukum extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $produkHukum         = new Model_produk_hukum();
        $data                = $produkHukum->getProdukHukum();
        $log                 = new Model_log();
        $idProdukHukum       = $this->request->getPost('idProdukHukum');
        $file                = $this->request->getFile('file');
        $namaProdukHukum     = "produkHukum_".$this->request->getPost('produkHukum').'.pdf';
        unlink('produkHukum/'.$data[0]['berkasProdukHukum']);   
        $file->move('produkHukum/', $namaProdukHukum);
        $data = [
            'namaProdukHukum'   => $this->request->getPost('produkHukum'),
            'berkasProdukHukum' => $namaProdukHukum,
            'keterangan'        => $this->request->getPost('keterangan'),
            'authorProdukHukum' => $session->get('nama'),
            'tanggalUpload'     => date('Y-m-d')
        ];
        $produkHukum->update($idProdukHukum,$data);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Produk Hukum',
            'hakAkses'      => $session->get('hakAkses'),
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