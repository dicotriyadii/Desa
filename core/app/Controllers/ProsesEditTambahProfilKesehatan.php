<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_profil_kesehatan;
use App\Models\Model_log;

class ProsesEditTambahProfilKesehatan extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $profilKesehatan     = new Model_profil_kesehatan();
        $log                 = new Model_log();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');           
        $id                  = $this->request->getPost('id');
        $jenisPrasarana      = $this->request->getPost('jenisPrasarana');
        $jumlah              = $this->request->getPost('jumlah');
        $data = [
            'jenisPrasarana'    => $jenisPrasarana,
            'jumlah'            => $jumlah
        ];
        $profilKesehatan->update($id,$data);
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Profil Kesehatan',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan Profil Kesehatan berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminProfilSaranaPrasarana');
    }
 
}