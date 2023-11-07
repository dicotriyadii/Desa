<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_profil_airBersih;
use App\Models\Model_log;
use App\Models\Model_data;

class ProsesTambahProfilAirBersih extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $profilAirBersih     = new Model_profil_AirBersih();
        $log                 = new Model_log(); 
        $modelData           = new Model_data(); 
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');           
        $jenisAirBersih      = $this->request->getPost('jenisAirBersih');
        $jumlah              = $this->request->getPost('jumlah');
        $dataDesa = $modelData->getDesa($kodeKecamatanLog,$kodeDesaLog);
        $data = [
            'kodeKecamatan'     => $kodeKecamatanLog,
            'kodeDesa'          => $kodeDesaLog,
            'jenisAirBersih'    => $jenisAirBersih,
            'jumlah'            => $jumlah,
        ];
        $profilAirBersih->insert($data);
        //Log
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penambahan Profil Air Bersih',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "profil Air Bersih berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminProfilSaranaPrasarana');
    } 
}