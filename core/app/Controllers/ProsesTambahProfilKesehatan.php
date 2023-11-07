<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_profil_kesehatan;
use App\Models\Model_log;
use App\Models\Model_data;

class ProsesTambahProfilKesehatan extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $profilKesehatan     = new Model_profil_kesehatan();
        $log                 = new Model_log(); 
        $modelData           = new Model_data(); 
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');           
        $jenisPrasarana      = $this->request->getPost('jenisPrasarana');
        $jumlah              = $this->request->getPost('jumlah');
        $dataDesa = $modelData->getDesa($kodeKecamatanLog,$kodeDesaLog);
        $data = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'jenisPrasarana' => $jenisPrasarana,
            'jumlah'        => $jumlah,
        ];
        $profilKesehatan->insert($data);
        //Log
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penambahan Profil Kesehatan',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "profil Kesehatan berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminProfilSaranaPrasarana');
    } 
}