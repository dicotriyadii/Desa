<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_profil_keamanan;
use App\Models\Model_log;

class ProsesEditTambahProfilKeamanan extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $profilKeamanan      = new Model_profil_keamanan();
        $log                 = new Model_log();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');           
        $id                  = $this->request->getPost('id');
        $keamanan            = $this->request->getPost('keamanan');
        $jumlah              = $this->request->getPost('jumlah');
        $data = [
            'keamanan'      => $keamanan,
            'jumlah'        => $jumlah
        ];
        $profilKeamanan->update($id,$data);
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Profil Keamanan',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan Profil Keamanan berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminProfilKeamanan');
    }
 
}