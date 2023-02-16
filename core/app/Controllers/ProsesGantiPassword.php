<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_warga;
use App\Models\Model_log;

class ProsesGantiPassword extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session             = session();
        $warga               = new Model_warga();
        $log                 = new Model_log();       
        $dataWarga           = $warga->where('nomorIndukKependudukan',$session->get('nik'))->findAll();
        $idWarga             = $dataWarga[0]['idWarga'];
        $jumlahHash = [
            'cost' => 10,
        ];
        $cekPasswordLama = password_verify($this->request->getPost('passwordLama'),$dataWarga[0]['password']);
        if($cekPasswordLama == false){
            $ses_data = [
                'statusTambah'  => "Gagal",
                'keterangan'    => "Password Lama tidak sesuai, silahkan coba lagi"
            ];
            $session->set($ses_data);
            return redirect()->to(base_url().'/../profile/'.$session->get('nik'));
        }
        $data = [
            'password'      => password_hash($this->request->getPost('passwordBaru'),PASSWORD_DEFAULT,$jumlahHash),
        ];
        $warga->update($idWarga,$data);
        //Log
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Perubahan password '. $dataWarga[0]['namaWarga'],
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Pergantian Password Berhasil"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/../index.php/profile/'.$dataWarga[0]['nomorIndukKependudukan']);
    }
    public function resetPassword($id=null)
    {
        $session             = session();
        $warga               = new Model_warga();
        $log                 = new Model_log();       
        $dataWarga           = $warga->where('nomorIndukKependudukan',$id)->findAll();
        $idWarga             = $dataWarga[0]['idWarga'];
        $jumlahHash = [
            'cost' => 10,
        ];
        $data = [
            'password'      => password_hash($id,PASSWORD_DEFAULT,$jumlahHash),
        ];
        $warga->update($idWarga,$data);
        //Log
        $dataLog = [
            'nama'          => $session->get('nama'),
            'waktu'         => date('Y-m-d H:i:s'),
            'keterangan'    => 'Reset Password '. $dataWarga[0]['namaWarga'],
            'hakAkses'      => $session->get('hakAkses'),
        ];
        $log->insert($dataLog);
        $ses_data = [
            'statusTambah'  => "Berhasil",
            'keterangan'    => "Pergantian Password Berhasil"
        ];
        $session->set($ses_data);
        return redirect()->to(base_url().'/adminWargaNegara');
    }
 
}