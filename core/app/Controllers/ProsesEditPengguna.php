<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_user;
use App\Models\Model_log;

class ProsesEditPengguna extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session    = session();
        $pengguna   = new Model_user();
        $log        = new Model_log();
        $idUser     = $this->request->getPost('idUser');
        $data = [
            'username'  => $this->request->getPost('username'),
            'nama'      => $this->request->getPost('nama'),
            'jabatan'   => $this->request->getPost('jabatan'),
            'hakAkses'  => $this->request->getPost('hakAkses'),
        ];
        $pengguna->update($idUser,$data);
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Merubah Data User' . $this->request->getPost('username'),
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Perubahan Pengguna berhasil dirubah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminManajemenPengguna');
    }
 
}