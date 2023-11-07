<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_pengumuman;
use App\Models\Model_log;

class ProsesEditTambahPengumuman extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $pengumuman          = new Model_pengumuman();
        $log                 = new Model_log();
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');   
        $idPengumuman        = $this->request->getPost('idPengumuman');
        $isiPengumuman       = $this->request->getPost('pengumuman');        
        $data = [
            'kodeKecamatan'     => $kodeKecamatanLog,
            'kodeDesa'          => $kodeDesaLog,
            'tanggalPengumuman' => date('y-m-d'),
            'pengumuman'        => $isiPengumuman,
        ];
        $pengumuman->update($idPengumuman,$data);
        //Log
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Edit pengumuman '. $this->request->getPost('pengumuman'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Pengumuman berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminPengumuman');
    }
}