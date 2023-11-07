<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_profil_rawanBencana;
use App\Models\Model_log;

class ProsesEditTambahProfilRawanBencana extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $profilRawanBencana  = new Model_profil_rawanBencana();
        $log                 = new Model_log();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');           
        $id                  = $this->request->getPost('id');
        $jenisBencana        = $this->request->getPost('jenisBencana');
        $jumlah              = $this->request->getPost('jumlah');
        $data = [
            'jenisBencana'  => $jenisBencana,
            'jumlah'        => $jumlah
        ];
        $profilRawanBencana->update($id,$data);
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data Profil Rawan Bencana',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan Profil Rawan Bencana berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminProfilRawanBencana');
    }
 
}