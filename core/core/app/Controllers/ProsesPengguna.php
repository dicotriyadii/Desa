<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_user;
use App\Models\Model_log;

class ProsesPengguna extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session    = session();
        $pengguna   = new Model_user();
        $log        = new Model_log();
        $cekPengguna = $pengguna->where('username',$this->request->getPost('username'))->findAll();
        $jumlahSuperAdmin = $pengguna->where('hakAkses','superAdmin')->countAllResults();
        if($this->request->getPost('hakAkses') == 'superAdmin'){
            if($jumlahSuperAdmin == 2 ){
                $dataLog = [
                    'nama'          => $session->get('nama'),
                    'waktu'         => date('Y-m-d H:i:s'),
                    'keterangan'    => 'Gagal menambah pengguna baru',
                    'hakAkses'          => $session->get('hakAkses'),
                ];
                $log->insert($dataLog);
                $ses_data = [
                    'statusTambah' => "Gagal",
                    'keterangan'=> "Hak Akses sebagai Super Admin Max 2 User"
                ];    
                $session->set($ses_data);
                return redirect()->to(base_url().'/formPengguna');
            }
        }
        if($cekPengguna != null){
            $dataLog = [
                'nama'          => $session->get('nama'),
                'waktu'         => date('Y-m-d H:i:s'),
                'keterangan'    => 'gagal menambah pengguna baru',
                'hakAkses'          => $session->get('hakAkses'),
            ];
            $log->insert($dataLog);
            $ses_data = [
                'statusTambah' => "Gagal",
                'keterangan'=> "Username sudah Terdaftar"
            ];    
            $session->set($ses_data);
            return redirect()->to(base_url().'/formPengguna');
        }
        $jumlahHash = [
            'cost' => 10,
        ];
        $data = [
            'username'      => $this->request->getPost('username'),
            'password'      => password_hash($this->request->getPost('password'),PASSWORD_DEFAULT,$jumlahHash),
            'nama'          => $this->request->getPost('nama'),
            'jabatan'       => $this->request->getPost('jabatan'),
            'hakAkses'      => $this->request->getPost('hakAkses'),
            'pertanyaan'    => $this->request->getPost('pertanyaanLupaPassword'),
            'jawaban'       => $this->request->getPost('jawabanLupaPassword'),
        ];
        $pengguna->insert($data);
        
        //Log
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'menambah Pengguna baru dengan user '. $this->request->getPost('username'),
            'hakAkses'          => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);

        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Pengguna baru berhasil di tambah"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/formPengguna');
    }

    public function hapusAkun($id=null)
    {
        $session    = session();
        $pengguna   = new Model_user();
        $hapus      = $pengguna->delete($id);
        $ses_data = [
            'statusTambah' => "Berhasil",
            'keterangan'=> "Pengguna berhasil di hapus"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminManajemenPengguna');
    }
 
}