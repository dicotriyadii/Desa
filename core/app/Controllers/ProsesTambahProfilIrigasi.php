<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_profil_irigasi;
use App\Models\Model_log;
use App\Models\Model_data;

class ProsesTambahProfilIrigasi extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $profilIrigasi       = new Model_profil_Irigasi();
        $log                 = new Model_log(); 
        $modelData           = new Model_data(); 
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');           
        $jenisIrigasi        = $this->request->getPost('jenisIrigasi');
        $jumlah              = $this->request->getPost('jumlah');
        $dataDesa = $modelData->getDesa($kodeKecamatanLog,$kodeDesaLog);
        $data = [
            'kodeKecamatan'     => $kodeKecamatanLog,
            'kodeDesa'          => $kodeDesaLog,
            'jenisIrigasi'      => $jenisIrigasi,
            'jumlah'            => $jumlah,
        ];
        $profilIrigasi->insert($data);
        //Log
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penambahan Profil Irigasi',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "profil Irigasi berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminProfilSaranaPrasarana');
    } 
}