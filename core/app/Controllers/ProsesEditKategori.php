<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_kategori;
use App\Models\Model_log;

class ProsesEditKategori extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session            = session();
        $kategori           = new Model_kategori();
        $log                = new Model_log();
        $kodeKecamatanLog   = $session->get('kodeKecamatan');
        $kodeDesaLog        = $session->get('kodeDesa');
        $usernameLog        = $session->get('nama');
        $idKategori     = $this->request->getPost('idKategori');
        $data = [
            'jenisKategori'  => $this->request->getPost('kategori'),
        ];
        $kategori->update($idKategori,$data);
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah jenis kategori',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Perubahan Jennis Kategori berhasil"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminKategori');
    }
 
}