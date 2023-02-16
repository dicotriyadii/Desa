<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_informasi_publik;
use App\Models\Model_log;

class ProsesEditInformasiPublik extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $informasiPublik     = new Model_informasi_publik();
        $data                = $informasiPublik->getInformasiPublik();
        $log                 = new Model_log();
        $idInformasiPublik   = $this->request->getPost('idInformasiPublik');
        $file                = $this->request->getFile('file');
        $namaInformasiPublik = "informasiPublik_".$this->request->getPost('informasiPublik').'.pdf';
        unlink('informasiPublik/'.$data[0]['berkasInformasiPublik']);   
        $file->move('informasiPublik/', $namaInformasiPublik);
        $data = [
            'namaInformasiPublik'   => $this->request->getPost('informasiPublik'),
            'berkasInformasiPublik' => $namaInformasiPublik,
            'keterangan'            => $this->request->getPost('keterangan'),
            'authorInformasiPublik' => $session->get('nama'),
            'tanggalUpload'          => date('Y-m-d')
        ];
        $informasiPublik->update($idInformasiPublik,$data);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Informasi Publik',
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan Informasi Publik berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminInformasiPublik');
    }
 
}