<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_profil_orbitasi;
use App\Models\Model_log;

class ProsesEditTambahProfilOrbitasi extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $profilOrbitasi      = new Model_profil_orbitasi();
        $log                 = new Model_log();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');           
        $id                  = $this->request->getPost('id');
        $jenisSarana         = $this->request->getPost('jenisSarana');
        $status              = $this->request->getPost('status');
        $data = [
            'jenisSarana'   => $jenisSarana,
            'status'  => $status
        ];
        $profilOrbitasi->update($id,$data);
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Profil Orbitasi',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan Profil Orbitasi berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminProfilRawanBencana');
    }
 
}