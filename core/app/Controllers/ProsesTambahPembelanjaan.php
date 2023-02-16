<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_pembelanjaan;
use App\Models\Model_log;

class ProsesTambahPembelanjaan extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session        = session();
        $pembelanjaan   = new Model_pembelanjaan();
        $log            = new Model_log();
        $data = [
            'jenisPembelanjaan'      => $this->request->getPost('jenisPembelanjaan'),
            'jumlah'                 => $this->request->getPost('jumlah'),
            'statusPembelanjaan'     => $this->request->getPost('statusPembelanjaan'),
            'tahun'                  => $this->request->getPost('tahun'),
        ];
        $pembelanjaan->insert($data);
        //Log
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Dana Pembelanjaan Berhasil Di Tambah ',
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Dana Pembelanjaan Berhasil Di Tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminDanaPembelanjaan');
    }

    public function hapusDanaPembelanjaan($id=null)
    {
        $session        = session();
        $pembelanjaan   = new Model_pembelanjaan();
        $log            = new Model_log();
        $data           = $pembelanjaan->where('idPembelanjaan',$id)->findAll();  
        $hapus          = $pembelanjaan->delete($id);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penghapusan Pembelanjaan '.$data[0]['jenisPembelanjaan'],
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);   
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Dana Pembelanjaan berhasil di hapus"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminDanaPembelanjaan');
    }
 
}