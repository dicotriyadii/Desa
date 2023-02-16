<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_warga;
use App\Models\Model_log;

class ProsesLoginWarga extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session    = session();
        $warga      = new Model_warga();
        $log        = new Model_log();
        $jumlahHash = [
            'cost' => 10,
        ];
        
        $cekWarga = $warga->where('nomorIndukKependudukan',$this->request->getPost('nik'))->findAll();
        if($cekWarga == null){
            $ses_data = [
                'statusTambah' => "Gagal",
                'keterangan'=> "Data anda tidak terdaftar <br> Silahkan hubungi Admin Desa"
            ];    
            $session->set($ses_data);
            return redirect()->to(base_url().'/loginWarga');
        }else{
            $cekPassword   = password_verify($this->request->getPost('password'),$cekWarga[0]['password']);
            if($cekPassword == false){
                $ses_data = [
                    'statusTambah' => "Gagal",
                    'keterangan'=> "Password Salah"
                ];    
                $session->set($ses_data);
                return redirect()->to(base_url().'/loginWarga');
            }
            $ses_data = [
                'status'    => "login",
                'nik'       => $cekWarga[0]['nomorIndukKependudukan'],
                'hakAkses'  => 'warga',
                'nama'      => $cekWarga[0]['namaWarga']
            ];    
            $session->set($ses_data);
            $dataLog = [
                'nama'          => $session->get('nama'),
                'waktu'         => date('Y-m-d H:i:s'),
                'keterangan'    => 'Login Akun',
                'hakAkses'      => 'warga',
            ];
            $log->insert($dataLog);
            return redirect()->to(base_url().'/admin');
        }
    }
 
}