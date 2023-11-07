<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_profil_olahraga;
use App\Models\Model_log;

class ProsesEditTambahProfilOlahraga extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $profilOlahraga      = new Model_profil_olahraga();
        $log                 = new Model_log();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');           
        $id                  = $this->request->getPost('id');
        $jenisLapangan       = $this->request->getPost('jenisLapangan');
        $jumlah              = $this->request->getPost('jumlah');
        $data = [
            'jenisLapangan'  => $jenisLapangan,
            'jumlah'         => $jumlah
        ];
        $profilOlahraga->update($id,$data);
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Profil Olahraga',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan Profil Olahraga berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminProfilSaranaPrasarana');
    }
 
}