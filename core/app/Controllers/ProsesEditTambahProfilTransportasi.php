<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_profil_transportasi;
use App\Models\Model_log;

class ProsesEditTambahProfilTransportasi extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $profilTranportasi   = new Model_profil_transportasi();
        $log                 = new Model_log();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');           
        $id                  = $this->request->getPost('id');
        $jenisSarana         = $this->request->getPost('jenisSarana');
        $kondisiBuruk        = $this->request->getPost('kondisiBuruk');
        $kondisiBaik         = $this->request->getPost('kondisiBaik');
        $data = [
            'jenisSarana'    => $jenisSarana,
            'kondisiBuruk'   => $kondisiBuruk,
            'kondisiBaik'   => $kondisiBaik
        ];
        $profilTranportasi->update($id,$data);
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Profil Tranportasi',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan Profil Tranportasi berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminProfilSaranaPrasarana');
    }
 
}