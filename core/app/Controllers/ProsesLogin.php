<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Model_user;
use App\Models\Model_warga;
use App\Models\Model_log;
use App\Models\Model_strukturPKK;
use App\Models\User_Model;
use App\Models\userModel;

class ProsesLogin extends ResourceController
{
    use ResponseTrait;

    public function create()
    {
        $session    = session();
        $pengguna   = new Model_user();
        $pkk        = new Model_strukturPKK();
        $log        = new Model_log();
        $warga      = new Model_warga();
        $user_dasawisma      = new User_Model();
        $jumlahHash = [
            'cost' => 10,
        ];
        $cekAnggotaPKK = $user_dasawisma->where('nik', $this->request->getPost('username'))->get()->getRowArray();
        if ($cekAnggotaPKK != null) {
            $dataWarga = $warga->where('nomorIndukKependudukan', $this->request->getPost('username'))->findAll();
            $cekPassword   = password_verify($this->request->getPost('password'), $dataWarga[0]['password']);
            if ($cekPassword == false) {
                $ses_data = [
                    'statusTambah' => "Gagal",
                    'keterangan' => "Password Warga Salah"
                ];
                $session->set($ses_data);
                return redirect()->to(base_url() . '/loginAdmin');
            } else {
                $ses_data = [
                    'nik' => $this->request->getPost('username'),
                ];
                $session->set($ses_data);
                return redirect()->to(base_url() . '/dasaWisma');
            }
        }
        $cekPengguna = $pengguna->where('username', $this->request->getPost('username'))->findAll();
        if ($cekPengguna == null) {
            $ses_data = [
                'statusTambah' => "Gagal",
                'keterangan' => "Username tidak terdaftar"
            ];
            $session->set($ses_data);
            return redirect()->to(base_url() . '/loginAdmin');
        } else {
            $cekPassword   = password_verify($this->request->getPost('password'), $cekPengguna[0]['password']);
            if ($cekPassword == false) {
                $ses_data = [
                    'statusTambah' => "Gagal",
                    'keterangan' => "Password Salah"
                ];
                $session->set($ses_data);
                return redirect()->to(base_url() . '/loginAdmin');
            }
            $ses_data = [
                'status' => "login",
                'hakAkses' => $cekPengguna[0]['hakAkses'],
                'nama' => $cekPengguna[0]['nama']
            ];
            $session->set($ses_data);
            $dataLog = [
                'nama'          => $session->get('nama'),
                'waktu'         => date('Y-m-d H:i:s'),
                'keterangan'    => 'Login Akun',
                'hakAkses'      => $session->get('hakAkses'),
            ];
            $log->insert($dataLog);
            return redirect()->to(base_url() . '/admin');
        }
    }
}
