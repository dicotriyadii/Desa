<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_profil_peribadatan;
use App\Models\Model_log;

class ProsesEditTambahProfilPeribadatan extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $profilPeribadatan   = new Model_profil_peribadatan();
        $log                 = new Model_log();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');           
        $id                  = $this->request->getPost('id');
        $jenisTempatIbadah   = $this->request->getPost('jenisTempatIbadah');
        $jumlah              = $this->request->getPost('jumlah');
        $data = [
            'jenisTempatIbadah'    => $jenisTempatIbadah,
            'jumlah'               => $jumlah,
        ];
        $profilPeribadatan->update($id,$data);
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Profil Peribadatan',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan Profil Peribadatan berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminProfilSaranaPrasarana');
    }
 
}