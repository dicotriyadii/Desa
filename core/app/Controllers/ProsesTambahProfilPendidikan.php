<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_profil_pendidikan;
use App\Models\Model_log;
use App\Models\Model_data;

class ProsesTambahProfilPendidikan extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $profilPendidikan    = new Model_profil_pendidikan();
        $log                 = new Model_log(); 
        $modelData           = new Model_data(); 
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');           
        $jenisGedung         = $this->request->getPost('jenisGedung');
        $sewa                = $this->request->getPost('sewa');
        $milikSendiri        = $this->request->getPost('milikSendiri');
        $dataDesa = $modelData->getDesa($kodeKecamatanLog,$kodeDesaLog);
        $data = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'jenisGedung'   => $jenisGedung,
            'sewa'          => $sewa,
            'milikSendiri'  => $milikSendiri,
        ];
        $profilPendidikan->insert($data);
        //Log
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penambahan Profil Pendidikan',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "profil Pendidikan berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminProfilSaranaPrasarana');
    } 
}