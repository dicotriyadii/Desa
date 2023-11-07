<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_pemberitahuan;
use App\Models\Model_log;

class ProsesTambahPemberitahuan extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $pemberitahuan       = new Model_pemberitahuan();
        $log                 = new Model_log(); 
        $kodeKecamatanLog    = $session->get('kodeKecamatan');
        $kodeDesaLog         = $session->get('kodeDesa');
        $usernameLog         = $session->get('nama');           
        $isiPemberitahuan    = $this->request->getPost('pemberitahuan');
        $data = [
            'kodeKecamatan'     => $kodeKecamatanLog,
            'kodeDesa'          => $kodeDesaLog,
            'pemberitahuan'     => $isiPemberitahuan,
        ];
        $pemberitahuan->insert($data);
        //Log
        $dataLog = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $usernameLog,
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Penambahan pemberitahuan',
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "pemberitahuan berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminPemberitahuan');
    } 
}