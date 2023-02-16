<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_kritikSaran;

class ProsesKritikSaran extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $kritikSaran         = new Model_KritikSaran();
        $data = [
            'nama'      => $this->request->getPost('nama'),
            'email'     => $this->request->getPost('email'),
            'kritik'    => $this->request->getPost('kritik'),
            'saran'     => $this->request->getPost('saran'),
            'tanggal'   => date('Y-m-d'),
        ];
        $kritikSaran->insert($data);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Kritik dan Saran anda sudah masuk ke dalam sistem kami, Terimakasih"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url());
    }
}