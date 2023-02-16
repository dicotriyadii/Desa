<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_user;
use App\Models\Model_log;

class ProsesLogout extends ResourceController
{
    use ResponseTrait;

    public function logout()
    {
        $session = session();
        $log        = new Model_log();
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Logout Akun',
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $arraySession = ['statusTambah','keterangan','status','hakAkses','nama'];
        $session->remove($arraySession);
        return redirect()->to(base_url());
    }
 
}