<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_user;
use App\Models\Model_log;

class ProsesLogin extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session    = session();
        $pengguna   = new Model_user();
        $log        = new Model_log();
        $jumlahHash = [
            'cost' => 10,
        ];
        
        $cekPengguna = $pengguna->where('username',$this->request->getPost('username'))->findAll();
        if($cekPengguna == null){
            $ses_data = [
                'statusTambah' => "Gagal",
                'keterangan'=> "Username tidak terdaftar"
            ];    
            $session->set($ses_data);
            return redirect()->to(base_url().'/login');
        }else{
            $cekPassword   = password_verify($this->request->getPost('password'),$cekPengguna[0]['password']);
            if($cekPassword == false){
                $ses_data = [
                    'statusTambah' => "Gagal",
                    'keterangan'=> "Password Salah"
                ];    
                $session->set($ses_data);
                return redirect()->to(base_url().'/login');
            }
            $ses_data = [
                'status' => "login",
                'hakAkses'=> $cekPengguna[0]['hakAkses'],
                'nama'=> $cekPengguna[0]['nama']
            ];    
            $session->set($ses_data);
            $dataLog = [
                'nama'          => $session->get('nama'),
                'waktu'         => date('Y-m-d H:i:s'),
                'keterangan'    => 'Login Akun',
                'hakAkses'      => $session->get('hakAkses'),
            ];
            $log->insert($dataLog);
            return redirect()->to(base_url().'/admin');
        }
    }
 
}