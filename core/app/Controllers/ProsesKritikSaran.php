<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_kritikSaran;

class ProsesKritikSaran extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        // inisialisasi Variable
        $session            = session();
        $kritikSaran        = new Model_KritikSaran();
        $kodeKecamatanLog   = $session->get('kodeKecamatan');
        $kodeDesaLog        = $session->get('kodeDesa');
        $usernameLog        = $session->get('nama'); 
        $nama               = $this->request->getPost('nama');
        $email              = $this->request->getPost('email');
        $kritik             = $this->request->getPost('kritik');
        $saran              = $this->request->getPost('saran');
        $data = [
            'kodeKecamatan' => $kodeKecamatanLog,
            'kodeDesa'      => $kodeDesaLog,
            'nama'          => $nama,
            'email'         => $email,
            'kritik'        => $kritik,
            'saran'         => $saran,
            'tanggal'       => date('Y-m-d'),
        ];
        $kritikSaran->insert($data);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Kritik dan Saran anda sudah masuk ke dalam sistem kami, Terimakasih"
        ];
        $session->set($ses_data);
        return redirect()->back();
    }
}