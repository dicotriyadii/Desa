<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_profil_sanitasi;
use App\Models\Model_log;

class ProsesEditTambahProfilSanitasi extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $profilSanitasi      = new Model_profil_sanitasi();
        $log                 = new Model_log();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');           
        $id                  = $this->request->getPost('id');
        $jenisSanitasi      = $this->request->getPost('jenisSanitasi');
        $jumlah              = $this->request->getPost('jumlah');
        $data = [
            'jenissanitasi'  => $jenisSanitasi,
            'jumlah'        => $jumlah
        ];
        $profilSanitasi->update($id,$data);
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Profil sanitasi',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan Profil sanitasi berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminProfilKeamanan');
    }
 
}