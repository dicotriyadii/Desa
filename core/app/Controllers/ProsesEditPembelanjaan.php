<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_pembelanjaan;
use App\Models\Model_log;

class ProsesEditPembelanjaan extends ResourceController
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
        $pembelanjaan->update($this->request->getPost('idPembelanjaan'),$data);
        
        //Log
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Update Dana Pembelanjaan Berhasil',
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Update Dana Pembelanjaan Berhasil"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminDanaPembelanjaan');
    }
 
}