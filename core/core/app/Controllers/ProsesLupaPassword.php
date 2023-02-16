<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_user;
use App\Models\Model_log;

class ProsesLupaPassword extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session            = session();
        $pengguna           = new Model_user();
        $log                = new Model_log();
        $pertanyaan         = $this->request->getPost('pertanyaanLupaPassword');
        $jawaban            = $this->request->getPost('jawabanLupaPassword');
        $cekPengguna        = $pengguna->where('username',$this->request->getPost('username'))->findAll();
        if($cekPengguna == null){
            $ses_data = [
                'statusTambah' => "Gagal",
                'keterangan'=> "Username tidak terdaftar"
            ];    
            $session->set($ses_data);
            return redirect()->to(base_url().'/login');
        }else{
            if($cekPengguna[0]['pertanyaan'] == $pertanyaan && $cekPengguna[0]['jawaban'] == $jawaban ){
                $jumlahHash = [
                    'cost' => 10,
                ];
                $dataArray = [
                    'password' => password_hash($this->request->getPost('passwordBaru'),PASSWORD_DEFAULT,$jumlahHash),
                ];
                $pengguna->update($cekPengguna[0]['idUser'],$dataArray);
                $dataLog = [
                    'nama'          => $cekPengguna[0]['nama'],
                    'waktu'         => date('Y-m-d H:i:s'),
                    'keterangan'    => 'Merubah password',
                    'hakAkses'      => $cekPengguna[0]['hakAkses'],
                ];
                $log->insert($dataLog);
                $ses_data = [
                    'statusTambah' => "Berhasil",
                    'keterangan'=> "Password Baru anda : " . $this->request->getPost('passwordBaru'),
                ];  
                $session->set($ses_data);
                return redirect()->to(base_url().'/login');
            }else{
                $ses_data = [
                    'statusTambah' => "Gagal",
                    'keterangan'=> "Pertanyaan atau Jawaban Salah"
                ];    
                $session->set($ses_data);
                return redirect()->to(base_url().'/lupaPassword');
            }
        }
    }
 
}