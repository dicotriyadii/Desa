<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_potensi;
use App\Models\Model_log;

class CProsesEditPotensi extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $potensi             = new Model_potensi();
        $log                 = new Model_log();
        $dataPotensi         = $potensi->where('idPotensi',$this->request->getPost('idPotensi'))->findAll();
        $gambar              = $this->request->getFile('gambar');
        $namaGambarPotensi   = "potensi_".$rand = rand(10, 50).'.jpg';
        $cekBerkas           = $potensi->where('gambar',$namaGambarPotensi)->findAll();
        // unlink('potensi/'.$dataPotensi[0]['gambar']);   
        $gambar->move('potensi/', $namaGambarPotensi);
        $data = [
            'jenisPotensi'  => $this->request->getPost('jenisPotensi'),
            'namaPotensi'   => $this->request->getPost('namaPotensi'),
            'alamatPotensi' => $this->request->getPost('alamat'),
            'helpdesk'      => $this->request->getPost('helpdesk'),
            'gambar'        => $namaGambarPotensi,
        ];
        $potensi->update($this->request->getPost('idPotensi'),$data);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Potensi',
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Potensi Desa berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminPotensiDesa');
    }
 
}