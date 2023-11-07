<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_profil_transportasi;
use App\Models\Model_log;
use App\Models\Model_data;

class ProsesTambahProfilTransportasi extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $profilTransportasi  = new Model_profil_Transportasi();
        $log                 = new Model_log(); 
        $modelData           = new Model_data(); 
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');           
        $jenisSarana         = $this->request->getPost('jenisSarana');
        $kondisiBuruk        = $this->request->getPost('kondisiBaik');
        $kondisiBaik         = $this->request->getPost('kondisiBuruk');
        $dataDesa = $modelData->getDesa($kodeKecamatanLog,$kodeDesaLog);
        $data = [
            'kodeKecamatan'     => $kodeKecamatanLog,
            'kodeDesa'          => $kodeDesaLog,
            'jenisSarana'       => $jenisSarana,
            'kondisiBuruk'      => $kondisiBuruk,
            'kondisiBaik'       => $kondisiBaik,
        ];
        $profilTransportasi->insert($data);
        //Log
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penambahan Profil Transportasi',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "profil Transportasi berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminProfilSaranaPrasarana');
    } 
}