<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_profil_sanitasi;
use App\Models\Model_log;
use App\Models\Model_data;

class ProsesTambahProfilSanitasi extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $profilSanitasi      = new Model_profil_Sanitasi();
        $log                 = new Model_log(); 
        $modelData           = new Model_data(); 
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');           
        $jenisSanitasi       = $this->request->getPost('jenisSanitasi');
        $jumlah              = $this->request->getPost('jumlah');
        $dataDesa = $modelData->getDesa($kodeKecamatanLog,$kodeDesaLog);
        $data = [
            'kodeKecamatan'     => $kodeKecamatanLog,
            'kodeDesa'          => $kodeDesaLog,
            'jenisSanitasi'     => $jenisSanitasi,
            'jumlah'            => $jumlah,
        ];
        $profilSanitasi->insert($data);
        //Log
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penambahan Profil Sanitasi',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "profil Sanitasi berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminProfilSaranaPrasarana');
    } 
}