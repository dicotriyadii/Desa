<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_profil_tataGunaLahan;
use App\Models\Model_log;

class ProsesEditTambahProfilTataGunaLahan extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $profilTataGunaLahan = new Model_profil_tataGunaLahan();
        $log                 = new Model_log();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');           
        $id                  = $this->request->getPost('id');
        $jenisLahan          = $this->request->getPost('jenisLahan');
        $jumlah              = $this->request->getPost('jumlah');
        $data = [
            'jenisLahan'    => $jenisLahan,
            'jumlah'        => $jumlah
        ];
        $profilTataGunaLahan->update($id,$data);
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Profil Desa',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan Profil Desa berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminProfilUmum');
    }
 
}