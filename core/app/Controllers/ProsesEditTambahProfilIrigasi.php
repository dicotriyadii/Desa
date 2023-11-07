<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_profil_irigasi;
use App\Models\Model_log;

class ProsesEditTambahProfilirigasi extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $profilIrigasi       = new Model_profil_irigasi();
        $log                 = new Model_log();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');           
        $id                  = $this->request->getPost('id');
        $jjenisIrigasi       = $this->request->getPost('jenisIrigasi');
        $jumlah              = $this->request->getPost('jumlah');
        $data = [
            'jenisIrigasi'  => $jjenisIrigasi,
            'jumlah'        => $jumlah
        ];
        $profilIrigasi->update($id,$data);
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Profil Irigasi',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan Profil Irigasi berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminProfilSaranaPrasarana');
    }
 
}