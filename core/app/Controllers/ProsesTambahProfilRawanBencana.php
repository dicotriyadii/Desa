<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_profil_rawanBencana;
use App\Models\Model_log;
use App\Models\Model_data;

class ProsesTambahProfilRawanBencana extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $profilRawanBencana  = new Model_profil_rawanBencana();
        $log                 = new Model_log(); 
        $modelData           = new Model_data(); 
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');           
        $jenisBencana        = $this->request->getPost('jenisBencana');
        $jumlah              = $this->request->getPost('jumlah');
        $dataDesa = $modelData->getDesa($kodeKecamatanLog,$kodeDesaLog);
        $data = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'jenisBencana'  => $jenisBencana,
            'jumlah'        => $jumlah,
        ];
        $profilRawanBencana->insert($data);
        //Log
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penambahan Profil Rawan Bencana',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "profil Produksi berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminProfilRawanBencana');
    } 
}