<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_profil_produksi;
use App\Models\Model_log;

class ProsesEditTambahProfilProduksi extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $profilProduksi      = new Model_profil_produksi();
        $log                 = new Model_log();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');           
        $id                  = $this->request->getPost('id');
        $jenisProduksi       = $this->request->getPost('jenisProduksi');
        $namaProduksi        = $this->request->getPost('namaProduksi');
        $data = [
            'jenisProduksi' => $jenisProduksi,
            'namaProduksi'  => $namaProduksi
        ];
        $profilProduksi->update($id,$data);
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Profil Produksi',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan Profil Produksi berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminProfilUmum');
    }
 
}