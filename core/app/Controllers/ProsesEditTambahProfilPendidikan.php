<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_profil_pendidikan;
use App\Models\Model_log;

class ProsesEditTambahProfilPendidikan extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $profilPendidikan    = new Model_profil_pendidikan();
        $log                 = new Model_log();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');           
        $id                  = $this->request->getPost('id');
        $jenisGedung         = $this->request->getPost('jenisGedung');
        $sewa                = $this->request->getPost('sewa');
        $milikSendiri        = $this->request->getPost('milikSendiri');
        $data = [
            'jenisGedung'    => $jenisGedung,
            'sewa'           => $sewa,
            'milikSendiri'   => $milikSendiri
        ];
        $profilPendidikan->update($id,$data);
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Profil Pendidikan',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan Profil Pendidikan berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminProfilSaranaPrasarana');
    }
 
}