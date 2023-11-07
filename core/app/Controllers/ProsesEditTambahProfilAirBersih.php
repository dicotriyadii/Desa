<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_profil_airBersih;
use App\Models\Model_log;

class ProsesEditTambahProfilAirBersih extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $profilAirBersih     = new Model_profil_airBersih();
        $log                 = new Model_log();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');           
        $id                  = $this->request->getPost('id');
        $jjenisAirBersih     = $this->request->getPost('jenisAirBersih');
        $jumlah              = $this->request->getPost('jumlah');
        $data = [
            'jenisAirBersih'=> $jjenisAirBersih,
            'jumlah'        => $jumlah
        ];
        $profilAirBersih->update($id,$data);
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Profil Air Bersih',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan Profil Air Bersih berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminProfilSaranaPrasarana');
    }
 
}